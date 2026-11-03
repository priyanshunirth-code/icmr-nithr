<?php
session_start();
include("language.php");
include("config.php");

$mrhruUnits = [
    [
        "id" => "unit-one",
        "name" => "MRHRU Unit I",
        "partner" => "Partner institution details to be added",
        "projects" => [
            ["title" => "Project I", "person" => "Person I", "status" => "Details to be updated"],
            ["title" => "Project II", "person" => "Person II", "status" => "Details to be updated"],
        ],
        "people" => ["Person I", "Person II", "Person III"],
    ],
    [
        "id" => "unit-two",
        "name" => "MRHRU Unit II",
        "partner" => "Partner institution details to be added",
        "projects" => [
            ["title" => "Project I", "person" => "Person I", "status" => "Details to be updated"],
            ["title" => "Project II", "person" => "Person II", "status" => "Details to be updated"],
        ],
        "people" => ["Person I", "Person II", "Person III"],
    ],
];

function mrhruEscape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MRHRU Units | ICMR-NITHR</title>
    <meta name="description" content="Model Rural Health Research Unit information for ICMR-NITHR, Jabalpur.">

    <?php include("GlobalCss.php"); ?>
    <?php include("GlobalJs.php"); ?>

    <style>
        :root {
            --mrhru-navy: #09203f;
            --mrhru-blue: #2583bd;
            --mrhru-blue-light: #537895;
            --mrhru-ink: #263445;
            --mrhru-muted: #64748b;
            --mrhru-line: #dbe3eb;
            --mrhru-surface: #ffffff;
            --mrhru-background: #f4f7f6;
        }

        body {
            background: var(--mrhru-background);
            color: var(--mrhru-ink);
        }

        .mrhru-hero {
            position: relative;
            overflow: hidden;
            margin-bottom: 32px;
            padding: 54px 20px;
            background: linear-gradient(135deg, var(--mrhru-blue-light) 0%, var(--mrhru-navy) 100%);
            color: #ffffff;
            text-align: center;
        }

        .mrhru-hero h1 {
            margin: 0;
            color: #ffffff !important;
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 700;
        }

        .mrhru-hero p {
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        .mrhru-main {
            padding-bottom: 48px;
        }

        .mrhru-container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .mrhru-placeholder-note {
            margin: 0 0 22px;
            padding: 13px 16px;
            border-left: 4px solid var(--mrhru-blue);
            border-radius: 6px;
            background: #eaf4fa;
            color: var(--mrhru-navy);
            line-height: 1.55;
        }

        .mrhru-unit-tabs,
        .mrhru-section-tabs {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .mrhru-unit-tabs {
            margin-bottom: 24px;
        }

        .mrhru-tab {
            border: 1px solid var(--mrhru-line);
            border-radius: 6px;
            background: var(--mrhru-surface);
            color: var(--mrhru-ink);
            cursor: pointer;
            font: inherit;
            font-weight: 600;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .mrhru-tab:hover,
        .mrhru-tab:focus-visible {
            border-color: var(--mrhru-blue);
            outline: none;
        }

        .mrhru-unit-tab {
            padding: 12px 24px;
        }

        .mrhru-section-tab {
            padding: 9px 16px;
            font-size: 0.92rem;
        }

        .mrhru-tab[aria-selected="true"] {
            border-color: var(--mrhru-navy);
            background: var(--mrhru-navy);
            color: #ffffff;
        }

        .mrhru-unit-panel[hidden],
        .mrhru-section-panel[hidden] {
            display: none;
        }

        .mrhru-partners {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .mrhru-card,
        .mrhru-content-card {
            border: 1px solid var(--mrhru-line);
            border-radius: 8px;
            background: var(--mrhru-surface);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
        }

        .mrhru-card {
            padding: 18px;
            border-top: 4px solid var(--mrhru-blue);
        }

        .mrhru-card-label {
            display: block;
            margin-bottom: 7px;
            color: var(--mrhru-blue);
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .mrhru-card h2 {
            margin: 0 0 5px;
            color: var(--mrhru-navy);
            font-size: 1.05rem;
        }

        .mrhru-card p {
            margin: 0;
            color: var(--mrhru-muted);
            line-height: 1.5;
        }

        .mrhru-content-card {
            min-height: 300px;
            padding: 26px;
        }

        .mrhru-section-tabs {
            margin-bottom: 18px;
        }

        .mrhru-content-card h2 {
            margin: 0 0 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--mrhru-blue);
            color: var(--mrhru-navy);
            font-size: 1.45rem;
        }

        .mrhru-content-card h3 {
            margin: 20px 0 10px;
            color: var(--mrhru-navy);
            font-size: 1.1rem;
        }

        .mrhru-content-card p,
        .mrhru-content-card li {
            line-height: 1.65;
        }

        .mrhru-detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .mrhru-detail {
            padding: 18px;
            border-left: 4px solid var(--mrhru-blue);
            border-radius: 6px;
            background: #f4f7f9;
        }

        .mrhru-detail h3 {
            margin-top: 0;
        }

        .mrhru-detail p,
        .mrhru-detail ul {
            margin-bottom: 0;
        }

        .mrhru-people {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .mrhru-person {
            padding: 16px;
            border: 1px solid var(--mrhru-line);
            border-radius: 6px;
            background: #f8fafc;
        }

        .mrhru-person strong,
        .mrhru-person span {
            display: block;
        }

        .mrhru-person strong {
            color: var(--mrhru-navy);
        }

        .mrhru-person span {
            margin-top: 5px;
            color: var(--mrhru-muted);
            font-size: 0.9rem;
        }

        .mrhru-table-wrap {
            overflow-x: auto;
            border: 1px solid var(--mrhru-line);
            border-radius: 6px;
        }

        .mrhru-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .mrhru-table th {
            padding: 13px 15px;
            background: var(--mrhru-blue);
            color: #ffffff;
            font-weight: 600;
        }

        .mrhru-table td {
            padding: 13px 15px;
            border-top: 1px solid var(--mrhru-line);
            line-height: 1.5;
        }

        .mrhru-table tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .mrhru-list {
            margin: 0;
            padding-left: 22px;
        }

        .mrhru-list li + li {
            margin-top: 9px;
        }

        @media (max-width: 760px) {
            .mrhru-partners,
            .mrhru-people {
                grid-template-columns: 1fr;
            }

            .mrhru-detail-grid {
                grid-template-columns: 1fr;
            }

            .mrhru-content-card {
                padding: 20px 16px;
            }

            .mrhru-hero {
                padding: 40px 16px;
            }
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">
        <?php include("header.php"); ?>

        <header class="mrhru-hero">
            <h1>Model Rural Health Research Units (MRHRU)</h1>
            <p>ICMR-NITHR, Jabalpur</p>
        </header>

        <main class="main-section mrhru-main">
            <div class="mrhru-container">
                <p class="mrhru-placeholder-note">
                    This page uses generic placeholders. Replace the sample unit, project, personnel, and contact details with approved information before publication.
                </p>

                <div class="mrhru-unit-tabs" role="tablist" aria-label="MRHRU units">
                    <?php foreach ($mrhruUnits as $index => $unit): ?>
                        <button
                            class="mrhru-tab mrhru-unit-tab"
                            id="<?php echo mrhruEscape($unit["id"]); ?>-tab"
                            type="button"
                            role="tab"
                            aria-controls="<?php echo mrhruEscape($unit["id"]); ?>"
                            aria-selected="<?php echo $index === 0 ? "true" : "false"; ?>"
                            data-unit-target="<?php echo mrhruEscape($unit["id"]); ?>">
                            <?php echo mrhruEscape($unit["name"]); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <?php foreach ($mrhruUnits as $index => $unit): ?>
                    <section
                        class="mrhru-unit-panel"
                        id="<?php echo mrhruEscape($unit["id"]); ?>"
                        role="tabpanel"
                        aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-tab"
                        <?php echo $index === 0 ? "" : "hidden"; ?>>
                        <div class="mrhru-partners">
                            <article class="mrhru-card">
                                <span class="mrhru-card-label">Programme authority</span>
                                <h2>Details to be confirmed</h2>
                                <p>Programme and scheme information will be added here.</p>
                            </article>
                            <article class="mrhru-card">
                                <span class="mrhru-card-label">Mentoring institute</span>
                                <h2>ICMR-NITHR, Jabalpur</h2>
                                <p>National Institute of Research in Tribal Health</p>
                            </article>
                            <article class="mrhru-card">
                                <span class="mrhru-card-label">Unit partner</span>
                                <h2><?php echo mrhruEscape($unit["partner"]); ?></h2>
                                <p>Partner and location information will be added when confirmed.</p>
                            </article>
                        </div>

                        <div class="mrhru-section-tabs" role="tablist" aria-label="<?php echo mrhruEscape($unit["name"]); ?> information">
                            <?php
                            $sections = [
                                "overview" => "About Unit",
                                "team" => "Team",
                                "projects" => "Projects",
                                "publications" => "Publications",
                                "activities" => "Activities",
                                "contact" => "Contact",
                            ];
                            foreach ($sections as $sectionId => $sectionLabel):
                                $tabId = $unit["id"] . "-" . $sectionId . "-tab";
                                $panelId = $unit["id"] . "-" . $sectionId;
                            ?>
                                <button
                                    class="mrhru-tab mrhru-section-tab"
                                    id="<?php echo mrhruEscape($tabId); ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="<?php echo mrhruEscape($panelId); ?>"
                                    aria-selected="<?php echo $sectionId === "overview" ? "true" : "false"; ?>"
                                    data-section-target="<?php echo mrhruEscape($panelId); ?>">
                                    <?php echo mrhruEscape($sectionLabel); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <div class="mrhru-content-card">
                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-overview"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-overview-tab">
                                <h2>About <?php echo mrhruEscape($unit["name"]); ?></h2>
                                <p>
                                    This section provides an overview of <?php echo mrhruEscape($unit["name"]); ?>.
                                    Add the approved unit profile, location, objectives, and services here.
                                </p>
                                <div class="mrhru-detail-grid">
                                    <article class="mrhru-detail">
                                        <h3>Unit profile</h3>
                                        <p>Background and operational details are to be added.</p>
                                    </article>
                                    <article class="mrhru-detail">
                                        <h3>Key objectives</h3>
                                        <ul>
                                            <li>Support health research relevant to local communities.</li>
                                            <li>Strengthen research capacity and collaboration.</li>
                                            <li>Share evidence to inform public health practice.</li>
                                        </ul>
                                    </article>
                                </div>
                            </section>

                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-team"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-team-tab"
                                hidden>
                                <h2>Team</h2>
                                <p>Personnel names and designations are placeholders pending confirmation.</p>
                                <ul class="mrhru-people">
                                    <?php foreach ($unit["people"] as $person): ?>
                                        <li class="mrhru-person">
                                            <strong><?php echo mrhruEscape($person); ?></strong>
                                            <span>Designation and role to be updated</span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>

                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-projects"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-projects-tab"
                                hidden>
                                <h2>Research projects</h2>
                                <div class="mrhru-table-wrap">
                                    <table class="mrhru-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Investigator</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($unit["projects"] as $project): ?>
                                                <tr>
                                                    <td><?php echo mrhruEscape($project["title"]); ?></td>
                                                    <td><?php echo mrhruEscape($project["person"]); ?></td>
                                                    <td><?php echo mrhruEscape($project["status"]); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>

                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-publications"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-publications-tab"
                                hidden>
                                <h2>Publications</h2>
                                <p>Publication titles, authors, and links will be added after verification.</p>
                                <ul class="mrhru-list">
                                    <li>Publication I — details to be added.</li>
                                    <li>Publication II — details to be added.</li>
                                </ul>
                            </section>

                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-activities"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-activities-tab"
                                hidden>
                                <h2>Activities and workshops</h2>
                                <p>Information about unit activities and events will be added here.</p>
                            </section>

                            <section
                                class="mrhru-section-panel"
                                id="<?php echo mrhruEscape($unit["id"]); ?>-contact"
                                role="tabpanel"
                                aria-labelledby="<?php echo mrhruEscape($unit["id"]); ?>-contact-tab"
                                hidden>
                                <h2>Contact and location</h2>
                                <p>Unit address, telephone, and email details are to be confirmed.</p>
                            </section>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include("footer.php"); ?>
    </div>

    <script>
        document.querySelectorAll("[data-unit-target]").forEach(function (tab) {
            tab.addEventListener("click", function () {
                document.querySelectorAll("[data-unit-target]").forEach(function (unitTab) {
                    unitTab.setAttribute("aria-selected", "false");
                });
                document.querySelectorAll(".mrhru-unit-panel").forEach(function (panel) {
                    panel.hidden = true;
                });

                tab.setAttribute("aria-selected", "true");
                var panel = document.getElementById(tab.dataset.unitTarget);
                if (panel) {
                    panel.hidden = false;
                }
            });
        });

        document.querySelectorAll("[data-section-target]").forEach(function (tab) {
            tab.addEventListener("click", function () {
                var unitPanel = tab.closest(".mrhru-unit-panel");
                if (!unitPanel) {
                    return;
                }

                unitPanel.querySelectorAll("[data-section-target]").forEach(function (sectionTab) {
                    sectionTab.setAttribute("aria-selected", "false");
                });
                unitPanel.querySelectorAll(".mrhru-section-panel").forEach(function (sectionPanel) {
                    sectionPanel.hidden = true;
                });

                tab.setAttribute("aria-selected", "true");
                var panel = document.getElementById(tab.dataset.sectionTarget);
                if (panel) {
                    panel.hidden = false;
                }
            });
        });
    </script>
</body>

</html>
