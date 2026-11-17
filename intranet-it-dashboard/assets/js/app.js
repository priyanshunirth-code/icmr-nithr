// ICMR-NITHR Intranet IT Dashboard
(function () {
  'use strict';

  const appShell = document.querySelector('.app-shell');
  const userRole = appShell ? appShell.dataset.role : 'User';
  const isMaster = userRole === 'Master';
  const csrfToken = document.querySelector('input[name="csrf"]')?.value || '';

  // DOM creation helper to eliminate innerHTML vulnerabilities
  function el(tag, attrs = {}, children = []) {
    const element = document.createElement(tag);
    for (const [key, val] of Object.entries(attrs)) {
      if (key === 'className') element.className = val;
      else if (key === 'textContent') element.textContent = val;
      else if (key.startsWith('data-')) element.setAttribute(key, val);
      else element[key] = val;
    }
    for (const child of Array.isArray(children) ? children : [children]) {
      if (typeof child === 'string' || typeof child === 'number') {
        element.appendChild(document.createTextNode(String(child)));
      } else if (child instanceof Node) {
        element.appendChild(child);
      }
    }
    return element;
  }

  // Centralized API fetch wrapper with 401 redirect & CSRF headers
  async function apiFetch(url, options = {}) {
    options.headers = options.headers || {};
    options.headers['Accept'] = 'application/json';
    if (csrfToken && !options.headers['X-CSRF-Token']) {
      options.headers['X-CSRF-Token'] = csrfToken;
    }
    const res = await fetch(url, options);
    if (res.status === 401) {
      window.location.href = 'index.php';
      throw new Error('Session expired');
    }
    return res;
  }

  // SPA View Navigation
  const views = document.querySelectorAll('.view');
  function showView(id) {
    views.forEach(v => v.classList.toggle('active', v.id === id));
    document.querySelectorAll('.nav-item').forEach(item => {
      item.classList.toggle('active', item.dataset.view === id);
    });
    document.querySelectorAll('.user-profile-btn').forEach(btn => {
      btn.classList.toggle('active', id === 'profile');
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });

    if (id === 'users' && isMaster) loadUsers();
    if (id === 'audit' && isMaster) loadAudit(1);
  }

  document.querySelectorAll('[data-view]').forEach(btn => {
    btn.addEventListener('click', () => showView(btn.dataset.view));
  });
  document.querySelectorAll('[data-view-target]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      showView(btn.dataset.viewTarget);
    });
  });

  // Modal controls
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('open');
  }
  function closeModal(modal) {
    modal.classList.remove('open');
    const msg = modal.querySelector('.alert');
    if (msg) msg.style.display = 'none';
  }

  document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.modal;
      if (target === 'inventoryModal') {
        const form = document.getElementById('inventoryForm');
        if (form) {
          form.reset();
          document.getElementById('inventoryFormAction').value = 'create';
          document.getElementById('inventoryFormId').value = '';
          document.getElementById('inventoryModalTitle').textContent = 'Add Inventory Record';
        }
      } else if (target === 'ipModal') {
        const form = document.getElementById('ipForm');
        if (form) {
          form.reset();
          document.getElementById('ipFormAction').value = 'create';
          document.getElementById('ipFormId').value = '';
          document.getElementById('ipModalTitle').textContent = 'Add IP Record';
        }
      } else if (target === 'importModal') {
        const type = btn.dataset.importType || 'ip';
        document.getElementById('importType').value = type;
        document.getElementById('importModalTitle').textContent = (type === 'inventory') ? 'Import Inventory CSV' : 'Import IP Records CSV';
        document.getElementById('importDescription').textContent = (type === 'inventory')
          ? 'CSV must include asset_id and device_name. Empty category/status default safely.'
          : 'CSV must include ip_address and hostname. Device status defaults to Unknown.';
        document.getElementById('importTemplateLink').href = `api/template.php?type=${type}`;
      }
      openModal(target);
    });
  });

  document.querySelectorAll('.modal-close').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.closest('.modal')));
  });
  document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal(modal);
    });
  });

  // Logout handler
  document.getElementById('logoutBtn')?.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('logoutForm')?.submit();
  });

  // Debounce helper
  function debounce(fn, delay = 300) {
    let t;
    return (...args) => {
      clearTimeout(t);
      t = setTimeout(() => fn(...args), delay);
    };
  }

  // ==========================================
  // IT INVENTORY LOGIC
  // ==========================================
  let invPage = 1;
  const invSearch = document.getElementById('inventorySearch');
  const invCat = document.getElementById('inventoryCategoryFilter');
  const invStat = document.getElementById('inventoryStatusFilter');
  const invExportBtn = document.getElementById('inventoryExportBtn');

  function updateInvExportUrl() {
    if (!invExportBtn) return;
    const q = new URLSearchParams({
      type: 'inventory',
      search: invSearch ? invSearch.value.trim() : '',
      category: invCat ? invCat.value : '',
      status: invStat ? invStat.value : '',
    });
    invExportBtn.href = `api/export.php?${q.toString()}`;
  }

  async function loadInventory(page = 1) {
    invPage = page;
    updateInvExportUrl();
    const table = document.getElementById('inventoryTable');
    if (!table) return;
    const tbody = table.querySelector('tbody');

    const q = new URLSearchParams({
      type: 'inventory',
      page: String(page),
      limit: '25',
      search: invSearch ? invSearch.value.trim() : '',
      category: invCat ? invCat.value : '',
      status: invStat ? invStat.value : '',
    });

    try {
      const res = await apiFetch(`api/data.php?${q.toString()}`);
      const data = await res.json();
      tbody.innerHTML = '';

      if (!data.rows || !data.rows.length) {
        tbody.appendChild(el('tr', {}, el('td', { colSpan: isMaster ? 10 : 9, className: 'empty', textContent: 'No matching inventory records found.' })));
        renderPagination('inventoryPagination', 0, 1, 1, loadInventory);
        return;
      }

      data.rows.forEach(row => {
        const tr = el('tr');
        tr.appendChild(el('td', { className: 'strong', textContent: row.asset_id || '' }));
        tr.appendChild(el('td', { textContent: row.device_name || '' }));
        tr.appendChild(el('td', { textContent: row.category || '' }));
        tr.appendChild(el('td', { textContent: `${row.brand || ''} ${row.model || ''}`.trim() || '—' }));
        tr.appendChild(el('td', { textContent: row.assigned_to || '—' }));
        tr.appendChild(el('td', { textContent: row.department || '—' }));
        tr.appendChild(el('td', { textContent: row.location || '—' }));

        // IP Address cell with warning indicator if not in directory
        const ipCell = el('td');
        if (row.ip_address) {
          ipCell.appendChild(document.createTextNode(row.ip_address));
          if (row.ip_in_directory === 0) {
            ipCell.appendChild(el('span', {
              className: 'ip-warning',
              title: 'Warning: This IP is not registered in the IP Directory',
              textContent: ' ⚠️ Not in IP Directory'
            }));
          }
        } else {
          ipCell.textContent = '—';
        }
        tr.appendChild(ipCell);

        const statusClass = (row.status === 'Assigned') ? 'assigned'
          : (row.status === 'Under Repair') ? 'repair'
          : (row.status === 'Retired') ? 'retired' : 'available';
        tr.appendChild(el('td', {}, el('span', { className: `status ${statusClass}`, textContent: row.status || '' })));

        if (isMaster) {
          const actionTd = el('td', { className: 'action-cell' });
          const editBtn = el('button', {
            type: 'button',
            className: 'btn-sm btn-outline',
            textContent: 'Edit'
          });
          editBtn.addEventListener('click', () => openEditInventory(row));
          actionTd.appendChild(editBtn);

          const delBtn = el('button', {
            type: 'button',
            className: 'btn-delete',
            textContent: 'Delete'
          });
          delBtn.addEventListener('click', () => deleteRecord('inventory', row.id, row.asset_id));
          actionTd.appendChild(delBtn);

          tr.appendChild(actionTd);
        }
        tbody.appendChild(tr);
      });

      renderPagination('inventoryPagination', data.total, data.page, data.pages, loadInventory);
    } catch (err) {
      console.error('Failed to load inventory', err);
    }
  }

  function openEditInventory(row) {
    document.getElementById('inventoryFormAction').value = 'update';
    document.getElementById('inventoryFormId').value = row.id;
    document.getElementById('inventoryModalTitle').textContent = `Edit Inventory: ${row.asset_id}`;
    document.getElementById('inv_asset_id').value = row.asset_id || '';
    document.getElementById('inv_device_name').value = row.device_name || '';
    document.getElementById('inv_category').value = row.category || 'Other';
    document.getElementById('inv_brand').value = row.brand || '';
    document.getElementById('inv_model').value = row.model || '';
    document.getElementById('inv_serial_number').value = row.serial_number || '';
    document.getElementById('inv_assigned_to').value = row.assigned_to || '';
    document.getElementById('inv_department').value = row.department || '';
    document.getElementById('inv_location').value = row.location || '';
    document.getElementById('inv_ip_address').value = row.ip_address || '';
    document.getElementById('inv_status').value = row.status || 'Available';
    document.getElementById('inv_remarks').value = row.remarks || '';
    openModal('inventoryModal');
  }

  if (invSearch) invSearch.addEventListener('input', debounce(() => loadInventory(1), 300));
  if (invCat) invCat.addEventListener('change', () => loadInventory(1));
  if (invStat) invStat.addEventListener('change', () => loadInventory(1));

  // ==========================================
  // IP DIRECTORY LOGIC
  // ==========================================
  let ipPage = 1;
  const ipSearch = document.getElementById('ipSearch');
  const ipTypeFilter = document.getElementById('ipDeviceTypeFilter');
  const ipAdFilter = document.getElementById('ipAdStatusFilter');
  const ipExportBtn = document.getElementById('ipExportBtn');

  function updateIpExportUrl() {
    if (!ipExportBtn) return;
    const q = new URLSearchParams({
      type: 'ip',
      search: ipSearch ? ipSearch.value.trim() : '',
      device_type: ipTypeFilter ? ipTypeFilter.value : '',
      ad_status: ipAdFilter ? ipAdFilter.value : '',
    });
    ipExportBtn.href = `api/export.php?${q.toString()}`;
  }

  async function loadDirectory(page = 1) {
    ipPage = page;
    updateIpExportUrl();
    const table = document.getElementById('ipTable');
    if (!table) return;
    const tbody = table.querySelector('tbody');

    const q = new URLSearchParams({
      type: 'directory',
      page: String(page),
      limit: '25',
      search: ipSearch ? ipSearch.value.trim() : '',
      device_type: ipTypeFilter ? ipTypeFilter.value : '',
      ad_status: ipAdFilter ? ipAdFilter.value : '',
    });

    try {
      const res = await apiFetch(`api/data.php?${q.toString()}`);
      const data = await res.json();
      tbody.innerHTML = '';

      if (!data.rows || !data.rows.length) {
        tbody.appendChild(el('tr', {}, el('td', { colSpan: isMaster ? 9 : 8, className: 'empty', textContent: 'No matching IP records found.' })));
        renderPagination('ipPagination', 0, 1, 1, loadDirectory);
        return;
      }

      data.rows.forEach(row => {
        const tr = el('tr');
        tr.appendChild(el('td', { className: 'strong', textContent: row.ip_address || '' }));
        tr.appendChild(el('td', { textContent: row.hostname || '' }));
        tr.appendChild(el('td', { textContent: row.device_type || '' }));

        const adClass = (row.ad_status === 'AD Registered') ? 'assigned' : 'repair';
        tr.appendChild(el('td', {}, el('span', { className: `status ${adClass}`, textContent: row.ad_status || '' })));
        tr.appendChild(el('td', { textContent: row.mac_address || '—' }));
        tr.appendChild(el('td', { textContent: row.department || '—' }));
        tr.appendChild(el('td', { textContent: row.location || '—' }));

        const stateClass = (row.device_status || '').toLowerCase();
        tr.appendChild(el('td', {}, el('span', { className: `dot-status ${stateClass}` }, [
          el('i'),
          document.createTextNode(row.device_status || 'Unknown')
        ])));

        if (isMaster) {
          const actionTd = el('td', { className: 'action-cell' });
          const editBtn = el('button', {
            type: 'button',
            className: 'btn-sm btn-outline',
            textContent: 'Edit'
          });
          editBtn.addEventListener('click', () => openEditIp(row));
          actionTd.appendChild(editBtn);

          const delBtn = el('button', {
            type: 'button',
            className: 'btn-delete',
            textContent: 'Delete'
          });
          delBtn.addEventListener('click', () => deleteRecord('ip', row.id, row.ip_address));
          actionTd.appendChild(delBtn);

          tr.appendChild(actionTd);
        }
        tbody.appendChild(tr);
      });

      renderPagination('ipPagination', data.total, data.page, data.pages, loadDirectory);
    } catch (err) {
      console.error('Failed to load IP directory', err);
    }
  }

  function openEditIp(row) {
    document.getElementById('ipFormAction').value = 'update';
    document.getElementById('ipFormId').value = row.id;
    document.getElementById('ipModalTitle').textContent = `Edit IP: ${row.ip_address}`;
    document.getElementById('ip_address_val').value = row.ip_address || '';
    document.getElementById('ip_hostname_val').value = row.hostname || '';
    document.getElementById('ip_device_type_val').value = row.device_type || 'Other';
    document.getElementById('ip_mac_val').value = row.mac_address || '';
    document.getElementById('ip_ad_val').value = row.ad_status || 'Non-AD';
    document.getElementById('ip_dept_val').value = row.department || '';
    document.getElementById('ip_loc_val').value = row.location || '';
    document.getElementById('ip_state_val').value = row.device_status || 'Unknown';
    document.getElementById('ip_remarks_val').value = row.remarks || '';
    openModal('ipModal');
  }

  if (ipSearch) ipSearch.addEventListener('input', debounce(() => loadDirectory(1), 300));
  if (ipTypeFilter) ipTypeFilter.addEventListener('change', () => loadDirectory(1));
  if (ipAdFilter) ipAdFilter.addEventListener('change', () => loadDirectory(1));

  // Global search shortcut
  const globalSearch = document.getElementById('globalSearch');
  if (globalSearch) {
    globalSearch.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        const val = globalSearch.value.trim();
        if (invSearch) invSearch.value = val;
        if (ipSearch) ipSearch.value = val;
        showView('inventory');
        loadInventory(1);
      }
    });
  }

  // ==========================================
  // DELETE HANDLER (BY ID ONLY)
  // ==========================================
  async function deleteRecord(type, id, key) {
    if (!confirm(`Are you sure you want to permanently delete ${key}? This action will be audited.`)) return;

    const form = new FormData();
    form.append('action', 'delete');
    form.append('csrf', csrfToken);
    form.append('id', id);

    const endpoint = (type === 'inventory') ? 'api/inventory.php' : 'api/ip.php';
    try {
      const res = await apiFetch(endpoint, { method: 'POST', body: form });
      const data = await res.json();
      if (res.ok && data.success) {
        if (type === 'inventory') loadInventory(invPage);
        else loadDirectory(ipPage);
      } else {
        alert(data.error || 'Failed to delete record.');
      }
    } catch (err) {
      alert('Network or server error during delete.');
    }
  }

  // ==========================================
  // MODAL FORM SUBMISSIONS (AJAX)
  // ==========================================
  function setupAjaxForm(formId, msgId, onSuccess) {
    const form = document.getElementById(formId);
    if (!form) return;
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const msg = document.getElementById(msgId);
      if (msg) msg.style.display = 'none';

      try {
        const res = await apiFetch(form.action, { method: 'POST', body: new FormData(form) });
        const data = await res.json();
        if (res.ok && data.success) {
          form.reset();
          closeModal(form.closest('.modal'));
          onSuccess(data);
        } else {
          if (msg) {
            msg.className = 'alert alert-error';
            msg.textContent = data.error || 'Operation failed.';
            msg.style.display = 'block';
          }
        }
      } catch (err) {
        if (msg) {
          msg.className = 'alert alert-error';
          msg.textContent = 'Server connection error.';
          msg.style.display = 'block';
        }
      }
    });
  }

  setupAjaxForm('inventoryForm', 'inventoryFormMsg', () => loadInventory(invPage));
  setupAjaxForm('ipForm', 'ipFormMsg', () => loadDirectory(ipPage));

  // CSV Import Form Handler
  const importForm = document.getElementById('importForm');
  if (importForm) {
    importForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const msg = document.getElementById('importFormMsg');
      if (msg) {
        msg.className = 'alert alert-warning';
        msg.textContent = 'Processing CSV import, please wait…';
        msg.style.display = 'block';
      }

      try {
        const res = await apiFetch(importForm.action, { method: 'POST', body: new FormData(importForm) });
        const data = await res.json();
        if (res.ok && data.success) {
          alert(data.message);
          importForm.reset();
          closeModal(importForm.closest('.modal'));
          loadInventory(1);
          loadDirectory(1);
        } else {
          if (msg) {
            msg.className = 'alert alert-error';
            msg.textContent = data.error || 'Import failed.';
            msg.style.display = 'block';
          }
        }
      } catch (err) {
        if (msg) {
          msg.className = 'alert alert-error';
          msg.textContent = 'Network or server error during import.';
          msg.style.display = 'block';
        }
      }
    });
  }

  // ==========================================
  // USER MANAGEMENT (MASTER ONLY)
  // ==========================================
  async function loadUsers() {
    const table = document.getElementById('usersTable');
    if (!table) return;
    const tbody = table.querySelector('tbody');

    try {
      const res = await apiFetch('api/users.php');
      const data = await res.json();
      tbody.innerHTML = '';

      if (!data.users || !data.users.length) {
        tbody.appendChild(el('tr', {}, el('td', { colSpan: 8, className: 'empty', textContent: 'No user accounts found.' })));
        return;
      }

      data.users.forEach(u => {
        const tr = el('tr');
        tr.appendChild(el('td', { textContent: u.id }));
        tr.appendChild(el('td', { className: 'strong', textContent: u.username }));
        tr.appendChild(el('td', {}, el('span', { className: `status ${u.role === 'Master' ? 'assigned' : 'available'}`, textContent: u.role })));

        const activeStatus = (u.is_active == 1)
          ? el('span', { className: 'dot-status online' }, [el('i'), document.createTextNode('Active')])
          : el('span', { className: 'dot-status offline' }, [el('i'), document.createTextNode('Disabled')]);
        tr.appendChild(el('td', {}, activeStatus));

        tr.appendChild(el('td', { textContent: u.last_login_at || 'Never' }));
        tr.appendChild(el('td', { textContent: (u.must_change_password == 1) ? 'Yes' : 'No' }));
        tr.appendChild(el('td', { textContent: u.created_at ? u.created_at.substring(0, 10) : '—' }));

        const actionTd = el('td', { className: 'action-cell' });

        // Toggle Active button
        const toggleBtn = el('button', {
          type: 'button',
          className: 'btn-sm btn-outline',
          textContent: (u.is_active == 1) ? 'Disable' : 'Enable'
        });
        toggleBtn.addEventListener('click', async () => {
          if (!confirm(`Are you sure you want to ${(u.is_active == 1) ? 'disable' : 'enable'} account '${u.username}'?`)) return;
          const fd = new FormData();
          fd.append('action', 'toggle_status');
          fd.append('id', u.id);
          fd.append('csrf', csrfToken);
          const r = await apiFetch('api/users.php', { method: 'POST', body: fd });
          const d = await r.json();
          if (r.ok && d.success) loadUsers();
          else alert(d.error || 'Failed to update account status.');
        });
        actionTd.appendChild(toggleBtn);

        // Change Role button
        const roleBtn = el('button', {
          type: 'button',
          className: 'btn-sm btn-outline',
          textContent: (u.role === 'Master') ? 'Make User' : 'Make Master'
        });
        roleBtn.addEventListener('click', async () => {
          const newRole = (u.role === 'Master') ? 'User' : 'Master';
          if (!confirm(`Change role of '${u.username}' to ${newRole}?`)) return;
          const fd = new FormData();
          fd.append('action', 'change_role');
          fd.append('id', u.id);
          fd.append('role', newRole);
          fd.append('csrf', csrfToken);
          const r = await apiFetch('api/users.php', { method: 'POST', body: fd });
          const d = await r.json();
          if (r.ok && d.success) loadUsers();
          else alert(d.error || 'Failed to update user role.');
        });
        actionTd.appendChild(roleBtn);

        // Reset Password button
        const resetBtn = el('button', {
          type: 'button',
          className: 'btn-sm btn-outline',
          textContent: 'Reset PW'
        });
        resetBtn.addEventListener('click', () => {
          document.getElementById('resetUserId').value = u.id;
          document.getElementById('resetUsernameDisplay').textContent = u.username;
          openModal('userResetModal');
        });
        actionTd.appendChild(resetBtn);

        tr.appendChild(actionTd);
        tbody.appendChild(tr);
      });
    } catch (err) {
      console.error('Failed to load users', err);
    }
  }

  // User create form
  const userCreateForm = document.getElementById('userCreateForm');
  if (userCreateForm) {
    userCreateForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const msg = document.getElementById('userCreateMsg');
      if (msg) msg.style.display = 'none';
      const fd = new FormData(userCreateForm);
      fd.append('csrf', csrfToken);
      try {
        const res = await apiFetch('api/users.php', { method: 'POST', body: fd });
        const data = await res.json();
        if (res.ok && data.success) {
          userCreateForm.reset();
          closeModal(userCreateForm.closest('.modal'));
          loadUsers();
        } else {
          if (msg) {
            msg.className = 'alert alert-error';
            msg.textContent = data.error || 'Failed to create user.';
            msg.style.display = 'block';
          }
        }
      } catch (err) {
        if (msg) {
          msg.className = 'alert alert-error';
          msg.textContent = 'Network or server error.';
          msg.style.display = 'block';
        }
      }
    });
  }

  // User reset password form
  const userResetForm = document.getElementById('userResetForm');
  if (userResetForm) {
    userResetForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const msg = document.getElementById('userResetMsg');
      if (msg) msg.style.display = 'none';
      const fd = new FormData(userResetForm);
      fd.append('csrf', csrfToken);
      try {
        const res = await apiFetch('api/users.php', { method: 'POST', body: fd });
        const data = await res.json();
        if (res.ok && data.success) {
          alert('Temporary password set. User will be forced to change it on next login.');
          userResetForm.reset();
          closeModal(userResetForm.closest('.modal'));
          loadUsers();
        } else {
          if (msg) {
            msg.className = 'alert alert-error';
            msg.textContent = data.error || 'Failed to reset password.';
            msg.style.display = 'block';
          }
        }
      } catch (err) {
        if (msg) {
          msg.className = 'alert alert-error';
          msg.textContent = 'Network or server error.';
          msg.style.display = 'block';
        }
      }
    });
  }

  // ==========================================
  // AUDIT LOG (MASTER ONLY)
  // ==========================================
  async function loadAudit(page = 1) {
    const table = document.getElementById('auditTable');
    if (!table) return;
    const tbody = table.querySelector('tbody');

    const u = document.getElementById('auditUserFilter')?.value.trim() || '';
    const a = document.getElementById('auditActionFilter')?.value.trim() || '';
    const df = document.getElementById('auditDateFrom')?.value || '';
    const dt = document.getElementById('auditDateTo')?.value || '';

    const q = new URLSearchParams({
      page: String(page),
      limit: '50',
      user: u,
      action: a,
      date_from: df,
      date_to: dt,
    });

    const exportBtn = document.getElementById('auditExportBtn');
    if (exportBtn) {
      const eq = new URLSearchParams(q);
      eq.set('export', '1');
      exportBtn.href = `api/audit.php?${eq.toString()}`;
    }

    try {
      const res = await apiFetch(`api/audit.php?${q.toString()}`);
      const data = await res.json();
      tbody.innerHTML = '';

      if (!data.rows || !data.rows.length) {
        tbody.appendChild(el('tr', {}, el('td', { colSpan: 8, className: 'empty', textContent: 'No audit records match the current filters.' })));
        renderPagination('auditPagination', 0, 1, 1, loadAudit);
        return;
      }

      data.rows.forEach(r => {
        const tr = el('tr');
        tr.appendChild(el('td', { textContent: r.id }));
        tr.appendChild(el('td', { textContent: r.created_at || '' }));
        tr.appendChild(el('td', { className: 'strong', textContent: r.username || '' }));
        tr.appendChild(el('td', {}, el('span', { className: 'status repair', textContent: r.action || '' })));
        tr.appendChild(el('td', { textContent: r.entity || '' }));
        tr.appendChild(el('td', { textContent: r.entity_id || '—' }));
        tr.appendChild(el('td', { textContent: r.ip || '' }));
        tr.appendChild(el('td', { textContent: r.details || '—' }));
        tbody.appendChild(tr);
      });

      const pages = Math.ceil(data.total / data.limit);
      renderPagination('auditPagination', data.total, data.page, pages, loadAudit);
    } catch (err) {
      console.error('Failed to load audit log', err);
    }
  }

  document.getElementById('auditApplyFilters')?.addEventListener('click', () => loadAudit(1));

  // ==========================================
  // PAGINATION CONTROLS RENDERER
  // ==========================================
  function renderPagination(containerId, total, currentPage, totalPages, onPageChange) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.innerHTML = '';
    if (total <= 0) return;

    const info = el('span', {
      className: 'pagination-info',
      textContent: `Total ${total} records · Page ${currentPage} of ${totalPages || 1}`
    });
    container.appendChild(info);

    const btnGroup = el('div', { className: 'btn-group' });

    const prevBtn = el('button', {
      type: 'button',
      className: 'btn btn-outline btn-sm',
      disabled: currentPage <= 1,
      textContent: '← Previous'
    });
    prevBtn.addEventListener('click', () => onPageChange(currentPage - 1));
    btnGroup.appendChild(prevBtn);

    const nextBtn = el('button', {
      type: 'button',
      className: 'btn btn-outline btn-sm',
      disabled: currentPage >= totalPages,
      textContent: 'Next →'
    });
    nextBtn.addEventListener('click', () => onPageChange(currentPage + 1));
    btnGroup.appendChild(nextBtn);

    container.appendChild(btnGroup);
  }

  // Profile Password Form
  const pwForm = document.getElementById('profilePasswordForm');
  if (pwForm) {
    pwForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const msg = document.getElementById('profileMsg');
      if (msg) msg.style.display = 'none';

      try {
        const res = await apiFetch(pwForm.action, { method: 'POST', body: new FormData(pwForm) });
        const data = await res.json();
        if (msg) {
          msg.style.display = 'block';
          if (res.ok && data.success) {
            msg.className = 'alert alert-success';
            msg.textContent = data.message;
            pwForm.reset();
          } else {
            msg.className = 'alert alert-error';
            msg.textContent = data.error || 'Failed to update password.';
          }
        }
      } catch (err) {
        if (msg) {
          msg.style.display = 'block';
          msg.className = 'alert alert-error';
          msg.textContent = 'Server connection error.';
        }
      }
    });
  }

  // Initial table data loads
  loadInventory(1);
  loadDirectory(1);
})();
