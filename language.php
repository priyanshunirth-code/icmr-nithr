<?php

// $set_language=$_GET['language'];
$set_language="";
$language='en';
if(isset($_GET['language'])){
    $set_language = $_GET['language']; 
}

if($set_language=='hi')
{
    $_SESSION['language']='hi';
}
elseif($set_language=='en'){
    $_SESSION['language']='en';
}
else{
    $_SESSION['language']='en';
}

if($_SESSION['language']=='hi'){
    $language='hi';
} else {
    $language='en';
}

if($language=='en'){
    $lang['home']="Home";
    $lang['about_us']="About Us";
    $lang['icmr']="ICMR-National Institute for Tribal Health Research, Jabalpur";
    $lang['who_we_are']="Who we are and <strong class=\"cs-color\">what we do?</strong>";
    $lang['about_para1']="The ICMR-National Institute for Tribal Health Research (NITHR), Jabalpur, formerly known as the ICMR-National Institute of Research in Tribal Health (NIRTH), and earlier known as the Regional Medical Research Centre for Tribals (RMRCT),
    saw the light of the day in three rooms at the adjoining Netaji Subhash Chandra Bose Medical College, Jabalpur, in 1984. The RMRCT was shifted to the main building,
    spanning a 36-acre lush-green campus in April 2002, and re-designated to its name (NIRTH) in 2014. The vision of the ICMR-NITHR is to improve health, nutrition,
    and educational awareness of tribes through basic, applied, and operational research to levels that they are no longer considered underprivileged communities of the country.";
    $lang['about_para2']="ICMR-NITHR, Jabalpur, since then, has grown to accommodate established laboratories on hemoglobinopathies, molecular genetics, molecular parasitology, genomic epidemiology, 
    viral diagnosis, microbiology, and in vitro research facilities associated with a modern central animal facility. ICMR-NITHR, Jabalpur produced the baseline data on nutritional disorders,
    hemoglobinopathies, common communicable diseases, socio-economic and demographic issues, paving the way for the development and implementation of interventions by the State Health
    authorities of Madhya Pradesh and Chhattisgarh. Further, it is constantly striving to identify the Socio-economic, demographic, and cultural profiles of the tribal population, giving
    improved insight about the various factors that compound and complicate the magnitude of the problem.  The major research areas of ICMR-NITHR, Jabalpur are on Hemoglobinopathies, Malaria,
    with a specific focus on tribal populations, Tuberculosis, with a specific focus on the Saharia tribe, Viral diseases of public health importance in central India, and health-related
    Social and behavioral practices of the Tribal population. 
    <br>
    ICMR-NITHR, Jabalpur, is collaborating with the Partner Central TB Division and has an IRL for the diagnosis of multidrug-resistant tuberculosis. ICMR-NITHR, Jabalpur, supports NACO in diagnosis,
    monitoring, and training of HIV/AIDS. ICMR-NITHR, Jabalpur, have demonstrated enormously high prevalence of tuberculosis in Saharia, PVTG in Gwalior and Chambal division. ICMR-NITHR, Jabalpur, have
    demonstrated the reduction of tuberculosis in Saharia tribe and ICMR-NITHR, Jabalpur, is committed to eliminate the tuberculosis in Saharia Tribe.  Studies among the tribal population of
    M.P, including the Saharia primitive tribe, led to the development of an intensified tuberculosis control program in the state. It also formed the basis for the launch of a project
    by GFATM for control of TB in these areas. 
    <br>
    ICMR-NITHR, Jabalpur, through its implementation research, has developed and demonstrated a model for effective control of malaria in tribal areas of Dindori, Balaghat, and Mandla district of
    Madhya Pradesh. The model on Fluorosis Mitigation through Nutrition supplementation, food diversification and Safe drinking water inducted into the national program. 
    <br>
    ICMR-NITHR, Jabalpur, has done the micro mapping of Hemoglobinopathies in Madhya Pradesh and Chhattisgarh. Institute steered training and capacity building for sickle cell anemia in 19 
    tribal dominated states of the country under joint initiative of ICMR and Ministry of Tribal Affairs (MOTA). Recently, in association with Ministry of Health and Family Welfare
    and ICMR-NITHR, Jabalpur, was involved in formulating training modules, operational guidelines for the National Sickle Cell Anemia Elimination Mission.";
    $lang['about_mandate']="Mandate of ICMR-NITHR, Jabalpur";
    $lang['mandate_content']="<ul>
    <li>To plan, conduct and coordinate research in order to bring out the specific health problems and health needs of the tribal of the country.</li>
    <li>To conduct epidemiological studies of communicable and non-communicable diseases among the tribal.</li>
    <li>To investigate haemoglobinopathies in tribal and other communities.</li>
    <li>To advise and assist the Government in planning, executing, monitoring and evaluation of tribal health programs and in training of health functionaries.</li>
    </ul>
                                            <p>The ultimate goal of ICMR-NITHR, Jabalpur, is to improve health, nutrition and health awareness among the aboriginals
    through basic, applied and operational research to a level that they are no longer considered under-privileged in
    term of health research in the country.</p>";
    
    $lang['about_priority']="Priority Areas of the Institute";
    $lang['priority_content']="<ul>
    <li>Saharia Tuberculosis Elimination Project (STEP): Towards End-TB mission.</li>
    <li>DISCUSS - Designing and Implementing Strategies for augmenting Community Understanding and health Service utilisation in Sickle cell disease.</li>
    <li>Deciphering epigenetic determinants of metabolic syndrome in tribes of Madhya Pradesh.</li>
    <li>Development of CRISPR-based point-of-care diagnostics for leprosy and tuberculosis.</li>
    <li>Improving accessibility of the Particularly Vulnerable Tribal groups of Madhya Pradesh to the public health system through the Social Vaccine approach</li>
    </ul>";


    $lang['director_profile']="<strong>ICMR-National Institute for Tribal Health Research, Jabalpur, is one of the 30 health
    research institutes working under the aegis of the Indian Council of Medical Research (ICMR),
    Department of Health Research, Ministry of Health and Family Welfare, Government of India.
    Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of
    India, ICMR-NITHR, Jabalpur, is surrounded by thickly-forested tribal dominated areas, and is the only
    publicly funded organization dedicated to research on health of tribes of the country. Considering
    health of aboriginals is of prime national importance, biomedical scientists of ICMR-NITHR, Jabalpur, with
    diverse training and expertise, supported by 100-plus technical staff and several scientific staff of
    different time-bound research projects are putting tireless endeavor in collaboration with state
    government health officials, to not only diagnose and intervene different diseases prevalent in
    tribes, but also perform high-end biomedical research using modern tools to understand the
    mechanism of diseases and utilize the knowhow to devise novel methods of intervention and
    control. Apart from this, social scientists of ICMR-NITHR, Jabalpur, are regularly involved in interacting with
    different tribal communities to campaign on the disease preventive measures, by which health
    issues can be mitigated before they emerge in a large way in communities.</strong><br><br>
                                 <p>In order to smoothen research activities, scientists and technical personnel of ICMR-NITHR, Jabalpur, form
    small groups based on their training and expertise into six different divisions; viz., Communicable
    Diseases, Genetic Disorders, Non-communicable Diseases, Social Science and Ethno-medicine,
    Vector Borne Diseases, and Viral and Zoonotic Diseases. Not only ICMR-NITHR, Jabalpur, provides free-of-
    cost laboratory-based diagnostic facilities using highly-sensitive methods to several diseases
    endemic to this region to tribal and non-tribal populations alike, regular counselling to patients
    and their relatives on personal protection, prevention and control of diseases is also provided.
    Apart from this, teams of scientists and technical staff of ICMR-NIRTH regularly make field-trips in
    hard-to-reach tribal areas to survey on the prevalence of different diseases in communities and
    where needed, help patients to undergo treatment at the local healthcare facilities. They also
    simultaneously collect biological samples, which constitute the raw material for research to find
    solutions and control by which health of tribes can be better managed.</p>
                                <p>Due to highly committed research in the area of tribal health, ICMR-NIRTH has been conferred
    with the prestigious ‘collaborating center for research on health of the aboriginal populations’ by
    the World Health Organization (WHO), Geneva. Furthermore, ICMR-NIRTH acts as the coordinating
    institute of the ‘Tribal Health Research Forum’ formed by ICMR, and is responsible to synchronize
    research on tribal health among other participating ICMR institutes working on heath of local
    tribes in India. Over the last 32 years of its existence, ICMR-NIRTH has significantly contributed to
    health research output of the country, especially on tribal health through dissemination of
    research in the form of publications, monographs and changing/formulating health policies based
    on research evidences. This is possible because of the geographical location of ICMR-NIRTH and
    tremendous facilities for biomedical and social scientific research created by the ICMR leadership,
    which is continuing till date. This might be the reason scientists of national and international
    repute are attracted to join hands and share expertise with scientists of ICMR-NIRTH, thereby
    building a strong network of collaborative research, evaluation of diagnosis and trial of vaccines
    etc. related to several diseases largely prevalent in tribes. </p>
                                <p>Effective integration and committed contribution of enthusiastic young professionals are keys to
    growth of every organization, especially scientific research institutes like ICMR-NIRTH.
    Hardworking and committed young medical, biological, social and natural scientists determined to
    make an impact to tribal health research are welcome to join hands with scientists of ICMR-NIRTH
    on their consistent effort to alleviate health issues of aboriginals, and contribute to the “Make-in-
    India for Healthy India” campaign of the honorable Prime Minister of India.</p><br><br>
                               <h5 class=\"text-right\">Dr. Aparup Das<br>
    <small>Director, ICMR-NITHR, Jabalpur</small></h5>";

    $lang['director_profile1']="<strong>The National Institute of Research in Tribal Health (NIRTH), Jabalpur is one of the 30 health
    research institutes working under the aegis of the Indian Council of Medical Research (ICMR),
    Department of Health Research, Ministry of Health and Family Welfare, Government of India.
    Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of
    India, ICMR-NIRTH is surrounded by thickly-forested tribal dominated areas, and is the only
    publicly funded organization dedicated to research on health of tribes of the country. Considering
    health of aboriginals is of prime national importance, biomedical scientists of ICMR-NIRTH with
    diverse training and expertise, supported by 100-plus technical staff and several scientific staff of
    different time-bound research projects are putting tireless endeavor in collaboration with state
    government health officials, to not only diagnose and intervene different diseases prevalent in
    tribes, but also perform high-end biomedical research using modern tools to understand the
    mechanism of diseases and utilize the knowhow to devise novel methods of intervention and
    control. Apart from this, social scientists of ICMR-NIRTH are regularly involved in interacting with
    different tribal communities to campaign on the disease preventive measures, by which health
    issues can be mitigated before they emerge in a large way in communities.</strong><br><br>
                                 <p>In order to smoothen research activities, scientists and technical personnel of ICMR-NIRTH form
    small groups based on their training and expertise into six different divisions; viz., Communicable
    Diseases, Genetic Disorders, Non-communicable Diseases, Social Science and Ethno-medicine,
    Vector Borne Diseases, and Viral and Zoonotic Diseases. Not only ICMR-NIRTH provides free-of-
    cost laboratory-based diagnostic facilities using highly-sensitive methods to several diseases
    endemic to this region to tribal and non-tribal populations alike, regular counselling to patients
    and their relatives on personal protection, prevention and control of diseases is also provided.
    Apart from this, teams of scientists and technical staff of ICMR-NIRTH regularly make field-trips in
    hard-to-reach tribal areas to survey on the prevalence of different diseases in communities and
    where needed, help patients to undergo treatment at the local healthcare facilities. They also
    simultaneously collect biological samples, which constitute the raw material for research to find
    solutions and control by which health of tribes can be better managed.</p>
                                <p>Due to highly committed research in the area of tribal health, ICMR-NIRTH has been conferred
    with the prestigious ‘collaborating center for research on health of the aboriginal populations’ by
    the World Health Organization (WHO), Geneva. Furthermore, ICMR-NIRTH acts as the coordinating
    institute of the ‘Tribal Health Research Forum’ formed by ICMR, and is responsible to synchronize
    research on tribal health among other participating ICMR institutes working on heath of local
    tribes in India. Over the last 32 years of its existence, ICMR-NIRTH has significantly contributed to
    health research output of the country, especially on tribal health through dissemination of
    research in the form of publications, monographs and changing/formulating health policies based
    on research evidences. This is possible because of the geographical location of ICMR-NIRTH and
    tremendous facilities for biomedical and social scientific research created by the ICMR leadership,
    which is continuing till date. This might be the reason scientists of national and international
    repute are attracted to join hands and share expertise with scientists of ICMR-NIRTH, thereby
    building a strong network of collaborative research, evaluation of diagnosis and trial of vaccines
    etc. related to several diseases largely prevalent in tribes. </p>
                                <p>Effective integration and committed contribution of enthusiastic young professionals are keys to
    growth of every organization, especially scientific research institutes like ICMR-NIRTH.
    Hardworking and committed young medical, biological, social and natural scientists determined to
    make an impact to tribal health research are welcome to join hands with scientists of ICMR-NIRTH
    on their consistent effort to alleviate health issues of aboriginals, and contribute to the “Make-in-
    India for Healthy India” campaign of the honorable Prime Minister of India.</p><br>";


    $lang['director_academic_title']="Academic Profile of Dr. Aparup Das";
    $lang['director_academic_profile']=" Dr. Aparup Das is a population geneticist and molecular evolutionary biologist by training.  He has brought his extensive
    training and experience on genomics and DNA sequence analyses initially in Drosophila and later on in malaria, and
    applied these modern biological techniques to understand malaria epidemiology in India and Africa. After obtaining
    graduate and post-graduate degrees in Zoology from Utkal University in Bhubaneswar and doctorate degree from the
    Banaras Hindu University in Varanasi, Dr. Das proceeded for a four-year post-doctoral study at the Ludwig Maximilians
    University in Munich, Germany, to be trained in genomics and bioinformatics. After coming back to India in 2005, he
    joined as a scientist at the ICMR-National Institute of Malaria Research at New Delhi, where he served for 12 years to
    study molecular epidemiology of malaria. In May 2016, he joined as the Director of the ICMR-Centre for Research in
    Medical Entomology in Madurai, Tamil Nadu and thereafter shifted to the ICMR-National Institute of Research in Tribal
    health as its Director. Over past 14 years of his research on molecular epidemiology of malaria in India and Cameroon
    (Africa), Dr. Das and his research group had unravelled several interesting genetic features of the malaria parasites, drug
    resistance, mixed species infections, population dynamics of mosquito vectors, host susceptibility of malaria and
    pharmacogenomics related to malaria.<br><br>
    Dr. Das has been conferred with many national and international awards and involved in several research projects
    involving national and international scientists on both Drosophila and malaria models. He has authored more than 100
    publications in population and evolutionary genetics and genomics, and supervised as many as 12 Ph. D. and more than
    70 Master theses. He has organized several national and international workshops/meetings including two 15-days
    Global Exchange Lecture Courses on malaria genomics in 2010 and 2017 funded by the European Molecular Biology
    Organization (EMBO), Germany. He is serving as editor of many high impact international journals and continuously
    review manuscripts of several prestigious national and international journals of repute.<br><br>
    At present, Dr. Das and his group are involved in two different major international projects; one funded by the National
    Institute of Health, USA to unravel complex malaria in India and the other by the India-Canada Centre for Innovative
    Multidisciplinary Partnerships to Accelerate Community Transformation and Sustainability (IC-IMPACTS) to devise novel
    point-of-care malaria diagnostics.  Dr. Das is interested in leveraging the traditional tribal knowledge in medical practice
    and translating the knowhow to modern medical practice. The ultimate aim of Dr. Das is to utilize the population genomic
    information in Indians to design evolutionary (personalized) medicine in India through novel diagnosis and therapeutics.";

    $lang['director_academic_title1']="Academic Profile of Dr Dr Bontha V. Babu ";
    $lang['director_academic_profile1']="Dr Bontha V. Babu, Director of the ICMR–National Institute of Research in Tribal Health, Jabalpur, is a Scientist-G (Director Grade Scientist) overseeing implementation research projects at the Indian Council of Medical Research, New Delhi. He previously served as Director of the ICMR–National Institute of Implementation Research, Jodhpur (April 2023–August 2025). A health social scientist with a PhD in Anthropology and a postgraduate diploma in Applied Statistics from Andhra University, Visakhapatnam, his research focuses on community-based interventions for health promotion and disease prevention. 
    <br>
    His expertise spans implementation research, tribal and vulnerable population health, disease control programme evaluation, cultural epidemiology, ethnography, research management, and health communication. He currently manages and funds projects on health systems strengthening and implementation research, and coordinates multicentre studies on primary healthcare. Dr Babu has published around 250 research papers and a dozen book chapters and is associated with several professional bodies and journals.";

    $lang['from_the_director_desk']="About the Director";
    
    $lang['director2026']="Dr Praveen K. Bharti is a Director and Scientist G at the ICMR–National Institute for Tribal Health Research (NITHR), Jabalpur, formerly known as the ICMR-National Institute of Research in Tribal Health (NIRTH). Dr Bharti has more than 22 years of experience in malaria research and public health, particularly among tribal and hard-to-reach populations in India.
    Dr Bharti has made substantial contributions to the understanding of malaria epidemiology, transmission dynamics, and control strategies, with a special focus on malaria  in tribal, forested, and endemic regions. His research has addressed critical aspects of malaria burden, including disease surveillance, vector–host interactions, operational challenges in malaria elimination, and the effectiveness of intervention strategies under field conditions. Through his work, he has contributed to strengthening evidence-based approaches for malaria control and elimination efforts in India.
    Over the course of his career, Dr Bharti has been involved in multicentric, interdisciplinary research projects supported by various funding agencies, contributing scientific inputs aligned with India’s malaria control and elimination goals. His work has helped bridge the gap between field-based research and public health implementation, particularly in underserved communities.
    Dr Bharti has authored and co-authored 175 scientific publications in peer-reviewed national and international journals. His publications span malaria epidemiology, public health research, and infectious disease control, and are widely cited by researchers and public health professionals. He has also contributed to technical reports and policy-relevant documents.
    In addition to his research contributions, Dr Bharti plays a key role in scientific leadership and mentorship, guiding junior scientists and research staff, and contributing to capacity building within the institute. As a Director and Scientist-G, he is actively involved in research planning, review, and coordination, supporting ICMR’s mandate to generate high-quality scientific evidence for improving public health.

";

    $lang['abdul_kalam_quote']="<p>Ultimately, education in its real sense is the pursuit of truth. It is an endless journey through knowledge and enlightenment.</p>
    <span>A. P. J. Abdul Kalam</span>";
    
    //former directors 
    $lang['leadership_title']="Leadership of ICMR-NITHR, Jabalpur";
    $lang['s_d_verma']="Dr. S.D. Verma";
    $lang['y_n_mathur']="Dr. Y.N. Mathur";
    $lang['b_n_saxena']="Dr. B.N. Saxena";
    $lang['r_s_tiwary']="Dr. R.S. Tiwary";
    $lang['neeru_singh']="Dr. Neeru Singh";
    $lang['a_p_das']="Dr. A.P. Dash";
    $lang['m_a_ansari']="Dr. M.A. Ansari";
    $lang['aprup_das']="Dr. Aparup Das";
    $lang['r_r_tiwari']="Dr. Rajnarayan R. Tiwari";
    $lang['bontha_babu']="Dr. Bontha V. Babu";
    $lang['rajiv_bahl']="DR. RAJIV BAHL";
    $lang['praveen_bharti']="Dr. Praveen K. Bharti";
    
    $lang['project_director']="Project Director";
    $lang['officer_in_charge']="Officer-in-charge";
    $lang['director_additional_charge']="Director (Addl. Charge)";
    $lang['director_general']="Director General, ICMR";
    $lang['director']="Director";
    $lang['director_incharge']="Director Incharge";

    $lang['oic_director']="OIC/Director";
    
    
   //events
    $lang['events']="Events"; 
    
    //menu items
    $lang['career_opportunity']="Career ";
    $lang['tenders']="Tenders";
    $lang['announcement']="Announcements";
    $lang['employees_corner']="Employee's Corner";
    $lang['rti']="RTI";
    $lang['contact_us']="Contact Us";
    $lang['about']="About";
    $lang['profile']="Profile";
    $lang['directors_desk']="Director's Desk";
    $lang['leadership_nithr']="Leadership of ICMR-NITHR";
    $lang['staff_list']="Staff List";
    $lang['research']="Research";
    $lang['scientist']="Scientist";
    $lang['publication']="Resources";
    $lang['media']="Media";
    $lang['press_release']="Press Release";
    $lang['photo_gallery']="Photo Gallery";
    $lang['video_gallery']="Video Gallery";
    $lang['nirth_news']="NIRTH in News";
    $lang['latest_research']="Latest Research";
    $lang['profiles']="Profiles";
    $lang['institutional_publications']="Institutional Publications";
    $lang['old_website']="Old Website";
    $lang['about_nirth']="About NIRTH";
    $lang['useful_links']="Useful Links";
    $lang['newsletter']="NewsLetter";
    $lang['address']="NITHR Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA";
    $lang['nithr']="NITHR";
    $lang['main_campus']="MAIN CAMPUS";
    $lang['old_name']="Formerly: Regional Medical Research Centre for Tribals (RMRCT)";
    $lang['indian_council_of_medical_research']="Indian Council of Medical Research";
    $lang['department_of_health_research']="Department of Health Research";
    $lang['ministry_of_health_family_welfare']="Ministry of Health & Family Welfare";
    $lang['ministry_of_tribal_affairs']="Ministry of Tribal Affairs";

    //home page
    $lang['vacancies']="Vacancies";
    $lang['vacancies_permanent']="Vacancies Permanent";
    $lang['vacancies_project']="Vacancies Project";
    $lang['whatsnew']="What's New";
    $lang['research_division']="Research Division";
    $lang['nirth_profile']="NIRTH Profile";
    $lang['admit_card']="Admit Card";
    $lang['employee_links']="Employee Links";
     $lang['events']="Events"; 
    $lang['phd_program']="AcSIR PhD Program";
    $lang['result']="Result";
    $lang['downloads']="Downloads";
    $lang['sophisticated_analytical_instrument_facility']="Sophisticated Analytical Instrument Facility";
    $lang['student_corner']="Student Corner";
    $lang['adjunct_faculty_scheme_icmr']="Adjunct Faculty Scheme of ICMR";
    $lang['readmore']="Read More";
    $lang['view_profile']="View Profile";
    $lang['view_All']="View All";
    $lang['director_profile_short']="The National Institute of Research in Tribal Health (NIRTH), Jabalpur is one of the 30 health research institutes working under the aegis of the Indian Council of Medical Research (ICMR), Department of Health Research, Ministry of Health and Family Welfare, Government of India. Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of India, ICMR-NIRTH is surrounded by thickly-forested tribal dominated areas,";

    $lang['director_general_profile']="Secretary to Government of India, Department of Health Research and Director General, Indian Council of Medical Research";
    
    $lang['research_training']="Research & Training";
    $lang['ongoing_projects']="Ongoing Projects";

    //departments
    $lang['vector_borne_diseases']="Vector Borne Diseases";
    $lang['communicable_diseases']="Communicable Diseases";
    $lang['non_communicable_diseases']="Non-Communicable Diseases";
    $lang['genetic_disorders']="Genetic Disorders";
    $lang['virology_zoonotic_diseases']="Virology & Zoonotic Diseases";
    $lang['social_science_ethnomedicine']="Social Science & Ethnomedicine";
    $lang['in_vivo_research']="In-Vivo Research";
    $lang['reception']="Reception";
    $lang['office_director']="Office of the Director";
    $lang['scientific']="Scientific";
    $lang['technical']="Technical";
    $lang['support']="Support";
    $lang['administration_accounts']="Administration / Accounts";
    $lang['vehicle_section']="Vehicle Section";
    $lang['division']="Division";
    $lang['scientific_divisions']="Scientists";

    //scientist profile
    $lang['email']="Email";
    $lang['phone']="Phone";
    $lang['scientific_profile']="Scientific Profile";
    $lang['research_interests']="Research Interests";
    $lang['scientific_staff']="Scientific Staff";
    $lang['past_research_students']="Past Research students";
    $lang['ongoing_research_projects']="Ongoing research projects";
    $lang['current_research_collaborators']="Current research collaborators";
    $lang['past_research_collaborators']="Past research collaborators";
    $lang['research_in_news']="Research in news";
    $lang['award_recognition_honours']="Award/Recognition/Honours";
    $lang['workshop_conference_organized']="Workshop/Conference Organized";
    $lang['academic_contributions']="Academic contributions";
    $lang['research_grants']="Research Grants";
    $lang['publications']="Publications";
    $lang['s_profile']="'s Profile";
    $lang['circular']="Circulars";
    $lang['novel_corona']="Diagnosis Novel Coronavirus";
    $lang['corona_activities']="Corona Activities by ICMR-NIRTH";
    $lang['committee']="Committee";
    $lang['facility']="Facilities";
    
    $lang['head1']="Result - Shortlisted candidates for the PhD Programme";
    $lang['head2']="Result - Selected candidates for the PhD Programme";
    $lang['email_change']="Important Notice: Email Address Change";
    $lang['marquee1']="Selected candidates for ACSIR PhD Programme (January 2025 Session)";
    $lang['marquee2']="Advertisement : AcSIR PhD Programme (August 2025 Session)";
    $lang['email_change_matter']="Please be advised that the following email addresses will no longer be in operation:
    <br><br>
    <ul>
        <strong>
        <li>director@nirth.res.in</li>
        <li>aparupdas@nirth.res.in</li>
        </strong>
    </ul>
    <br>Effective immediately, any correspondence sent to these addresses will not be received or addressed. 
    <br>For all future communications, kindly use the updated contact information provided on our website or reach out to <strong> director-nirth[at]icmr[dot]gov[dot]in </strong>for assistance.
    <br>We apologize for any inconvenience this may cause and appreciate your attention to this matter.
    <br><br>
    Thank you for your cooperation.";
    //Student's Corner
     $lang['msc-dissertation-training-programme']="Result of M.Sc. Dissertation Programme 2024-2025";
     $lang['registration']="Register here";
     $lang['Entomology']="A Two-year Post-Graduate Course M.Sc. in Public Health Entomology Admissions for 2022-24 Batch";
     $lang['CCRAS']="CCRAS Post Doctoral Fellowship Scheme";
     $lang['Advertisement']="ICMR-NIRTH in collaboration with AcSIR invites applications for Ph.D. Program of January 2025 Session";
     $lang['Advertisement-Aug-2025']="ICMR-NIRTH in collaboration with AcSIR invites applications for Ph.D. Program of August 2025 Session";
     $lang['Advertisement-CLOSED']="ICMR-NIRTH (Affiliated to AcSIR) announces admissions open for Ph.D. in Medical Research for the academic session August 2024";
     $lang['Advertisement-btn']="Advertisement";
     $lang['Advertisement1']="List of shortlisted candidates for the PhD Programme - August 2024 Session";
     $lang['Advertisement2']="List of shortlisted candidates for the PhD Programme - January 2025 Session";
     $lang['Advertisement3']="List of shortlisted candidates for the PhD Programme - August 2025 Session";
     $lang['PHD_Notice_August2025']="Notice: Centralized PhD Admission Interview – August 2025 Session";
     $lang['viewlist']="View List";
     $lang['result-1']="Selected candidates for the ACSIR PhD Programme - August 2024 Session";
     $lang['result-2']="Selected candidates for the ACSIR PhD Programme - January 2025 Session";
     $lang['result-btn']="Result";

    
    //Employee's Corner
    
    $lang['casual-leave']="Casual leave";
    $lang['download']="Download"; 
    $lang['charge-report']="Charge Report";
    $lang['child-care-leave']="Child Care Leave";
    $lang['gate-pass']="Gate Pass";
    $lang['life_certificate-pensioners']="Life Certificate for Pensioners/Family Pensioners 2025";
    $lang['Earned-Leave']="Earned Leave";
    $lang['ltc-form']="LTC Form";
    $lang['Medical-Reimburshment-Form-A']="Medical Reimburshment Form A	";
    $lang['Medical-Reimburshment-Form-B']="Medical Reimburshment Form B	";
    $lang['POL-Advance-Form']="Contingency / POL Advance Form	";
    $lang['POL-Adjustment-Form']="Contingency / POL Adjustment Form";
    $lang['Vehicle-Request-Form']="Vehicle Request Form";
     $lang['TA/DA-Adjustment-Form']="TA/DA Adjustment Form";
    $lang['LTC-Adjustment-Form']="LTC Adjustment Form";
    $lang['Tour-Programme-Form']="Tour Programme Form";
    $lang['POL-Advance-Form1']="TA/DA Expenditure Certificate";
     $lang['TA/DA-Expenditure-Certificate']="TA/DA Certificate";
    $lang['Tution-Fee-Reimburshment-Form']="Tution Fee Reimburshment Form";
    $lang['GPF-Advance-Form']="GPF Advance Form";
    $lang['GPF-Withdrawl-Form']="GPF Withdrawal Form	";
    $lang['Unfit/Fitness-Form']="Unfit/Fitness Form";
    $lang['Material-Indent-Form']="Material Indent Form";
    $lang['Honorarium-Form']="Honorarium Form";
    $lang['Mandate-Form']="Mandate Form	";
    $lang['Holdays_25']="Holidays List 2025	";
    $lang['Holdays_26']="Holidays List 2026	";
    
    //Photo Gallery Materials
    $lang['photo-gallery1']="Every year, on <b>8th May, International Thalassemia Day</b> is observed to raise awareness 
                                                                about this genetic blood disorder. Thalassemia affects the production of hemoglobin, leading 
                                                                to anemia and other health complications. The theme for this year’s observance is <b>“Empowering
                                                                Lives, Embracing Progress: Equitable and Accessible Thalassemia Treatment for All”</b>, 
                                                                emphasizing equal access to thalassemia treatment for all individuals, regardless of their 
                                                                location or economic conditions.In line with this goal, the ICMR-National Institute of Research 
                                                                in Tribal Health (NIRTH) organized a hands-on workshop on 8th May 2024. The workshop focused on 
                                                                the diagnosis of thalassemia and inherited hemoglobin disorders. Experts from various fields, 
                                                                including medical professionals, researchers, and scientists, gathered to share knowledge and 
                                                                insights. Topics such as screening and diagnosis of thalassemia and other hemoglobinopathies with
                                                                special emphasis on inerpretation of results of HPLC were covered in details.The workshop aimed 
                                                                to equip healthcare professionals with the necessary tools to diagnose thalassemia accurately 
                                                                and provide timely interventions. <b>Over 180 delegates</b> attended the workshop.";
    $lang['photo-gallery2']="A three-day workshop on <b>Applications of Biostatistics in Medical Research</b> was organized
                                                                from June 12th -14th, 2024 at ICMR-National Institute of Research in Tribal Health, Jabalpur.
                                                                The primary objective of this workshop is to foster interdisciplinary discussions on 
                                                                applications and practical challenges in biostatistics, ultimately contributing to 
                                                                evidence-based decision-making and improved healthcare outcomes.The event was graced by 
                                                                Guest of Honour, Dr. Rajiv Bahl, Secretary, Department of Health Research and DG, ICMR. 
                                                                In his address, he emphasized the crucial role of biostatistics in medical research and 
                                                                underscored the importance of its application in the healthcare sector. The key topics 
                                                                covered in the workshop are Introduction to Biostatistics, Basic Statistical Concepts, 
                                                                Hypothesis Testing, Research study designs and Sampling Techniques, Correlation and Regression,
                                                                Sample Size Estimation, Advance Biostatistical Techniques, Inferential Statistics and 
                                                                Exploratory Data Analysis and Hands on Session with software packages such as Minitab, 
                                                                SPSS and Excel. A total of 28 participants from various disciplines attended the workshop 
                                                                and benefitted from it.";
    $lang['photo-gallery3']="ICMR-NIRTH celebrates its 41st foundation day on 1st March 2024 with great enthusiasm. 
                                                                Dr. Deepak Saxena, Director, IIPH Gjandhinagar was the Chief Guest on the occasion and 
                                                                delivered the foundation day lecture on <b>Evidence to policy: role of research institutions</b>.
                                                                Padma Shri Dr Yazdi Italia was the guest of honour and speaking on the occasion he briefed 
                                                                on Sickle Cell Control programme and its origin.  Dr. Aparup Das, Director, ICMR-NIRTH 
                                                                welcomed the dignitaries, guests and briefed the research activities and achievements of 
                                                                the Institute.  Participants and winners of the National Sports Day were provided with 
                                                                certificates on the occasion. A cultural programme was organized by the staff and students
                                                                of the institute. Dr. KB Saha, Scientist G extended the vote of thanks. Dr. Nishant Saxena,
                                                                Scientist C coordinated all the events on the dias.";    
    $lang['photo-gallery4']="National Science Day was observed on 28th of February 2024. Speaking on the occasions
                                                                Dr. Aparup Das, Director, ICMR-NIRTH highlighted the role technological advancements  
                                                                for improving quality of life. Dr. Ruchi Jain Dey, Asst. Professor and Ramalingaswamy 
                                                                Fellow, BITS Pilani, Hyderabad delivered invited talk on indigenous technology for drug
                                                                design and diagnostics. Students of B.Pharma from Sri Ram Institute of Technology, 
                                                                Jabalpur visited the institute on this occasion and interacted with the Scientists. 
                                                                Dr Tapas Chakma, Scientist G extended the vote of thanks.";
    $lang['photo-gallery5']="International Women's Day was observed at ICMR-NIRTH on 11 March 2024. Prof. (Dr.) 
                                                                Kavita Sachdeva, Head ENT, NSCB Medical College, Jabalpur was the Chief Guest and she
                                                                shared her struggles and oath to success. Speaking on the occasion Dr. Aparup Das, Director
                                                                and Dr K. B. Saha, Scientist G expressed their views and also felicitated the female staff
                                                                and students of the institute.";
    $lang['photo-gallery6']="ICMR-NIRTH, Jabalpur organised symposium on <b>Sickle Cell Disease in India</b> at ICMR-NIREH, 
                                                                Bhopal on 22 and 23 February 2023";
    $lang['photo-gallery7']="During this two-days symposium, experts of different (clinical and Biomedical) field 
                                                                    across the country delivered talks on different aspects of SCD. The programme finished 
                                                                    with vote of thanks by Dr.  S. Rajasubramaniam, Scientist ‘E’, ICMR-NIRTH, Jabalpur. 
                                                                    Dr. Ravindra Kumar, Scientist ‘C’, ICMR-NIRTH Jabalpur co-ordinated all activities in
                                                                    this two-days symposium.
                                                                    <br>";
    $lang['photo-gallery8']="On January 16, 2025, ICMR-NIRTH organized a comprehensive training program on Sickle Cell Disease management, convening experts 
                            and healthcare professionals to share knowledge and best practices. The training program aimed to equip healthcare professionals 
                            with the knowledge and skills necessary to improve patient outcomes and advance the mission of the State Hemoglobinopathy Program. 
                            Dr Tapas Chakma, Scientist G, welcomed the dignitaries and participants. Dr. Dipty Jain, Former Professor, GMC, Nagpur served as 
                            chief guests and Dr. Ruby Khan, Deputy Director, NHM Bhopal as Guest of Honor. Dr. Shweta Pathak and Dr Vidhya K.S, Department of
                            Pediatrics, Dr K.K. Pandey, Department of Orthopedics and Dr Namrata Khandelwal, Department of Neurology, NSCB Medical College, 
                            Jabalpur were other faculty members in this training program. Around 60 participants from different district hospitals and medical 
                            colleges attended the training program. Dr Ravindra Kumar, Scientist D, ICMR-NIRTH co-ordinated the training program and extended 
                            vote of thanks.";
    //press
     $lang['news']="Press Release";
    $lang['news_1']="On January 18, 2025, a program on the integration of tribal traditional medicine with the public health system was organized at the Community Health Center, Bajag, District Dindori, under the aegis of the National Institute for Tribal Health Research (ICMR-NITHR), Jabalpur. The program featured discussions led by Dr. R.R. Tiwari, Director, ICMR-NIRTH, Dr. K.B. Saha, Scientist G, and Dr. Nishant Saxena, Scientist C. They engaged with traditional healers, including panda/guniya/vaidya practitioners, to establish a synergy between tribal traditional practices and modern healthcare systems. Traditional healers were encouraged to refer patients to the nearest healthcare centers for modern medical treatment alongside their practices.";
    $lang['news_2']="<p><b>Will find out the species of mosquitoes that spread elephantiasis  </b> <br>   ICMR research team collected samples from the affected areas of Indergarh along with the city. </p> ";
    $lang['news_3']=" <p><b>Innovations and practical challenges in biostatistics discussed</b> <br>
ICMR-National Institute of Research in Tribal Health (NIRTH), inaugurated three-days workshop on Application of Biostatistics in Medical Sciences starting 12.06.2024.</p>";
    $lang['news_4']="<p><b>Will be able to understand the science of epidemics by analyzing statistical data</b><br>
            The aim of the workshop is to promote interdisciplinary discussion on innovations and practical challenges in biostatistics. <br>";
    $lang['news_5']="The ICMR-NIRTH Jabalpur team led by Dr. Aparup Das, Director and Dr. KB Saha, Scientist F & NCO recently visited the Baran district of Rajasthan regarding the tuberculosis menace in the Saharia tribe (a PVTG). The visit was extensively covered in the local print media.";
    $lang['news_6']="International webinar on covid-19 news published in Gwalior's local hindi newspaper People's daily.";
    $lang['news_7']="Corona virus community survey by ICMR-NIRTH in Gwalior news published in Gwalior's local hindi newspaper Dainik Bhaskar and Nai Duniya daily on 16.05.20.";
    $lang['news_8']="Media coverage of Dr. Aparup Das, Directot on corona virus published in Pradesh Today on 29th March, local hindi newspaper.";
    $lang['news_9']="Corona virus testing in ICMR-NIRTH Laboratory news published in Local hindi newspaper Patrika on 19.03.20.";
    $lang['news_10']="37th Foundation day was celebrated with zeal on 4th March 2020 and local daily newspapers
                                                namely Patrika,Dainik Bhaskar and Hitvada published the news. The Additional Director General,ICMR Dr G S Toteja was the
                                                chief guest and The Director, ICMR-BMHRC, Bhopal Dr Prabha Desikan was the guest of honour.";
    $lang['news_11']="A Symposium and workshop on Tuberculosis held in ICMR-Nirth, Jabalpur on 17-18th December 2019 and local daily newspapers
                                                namely Patrika, Nav Bharat, Hitvada and Dainik Bhaskar published the news on 18th December 2019. The Vice Chancellor,
                                                Madhya Pradesh Medical sciences University Prof.RS Sharma was the chief guest and The Dean, NSCB Medical Colege, Jabalpur
                                                Dr PK Kasar was the guest of honour. Distinguished Scientists from various Institutes of the country attended and
                                                discussed regarding the strategies, challanges for combating the Tuberculosis.";
    $lang['news_12']="A Memorundum of Understanding (MOU) between Jiwaji University (JU), ICMR-National Institute of Research in Tribal Health
                                                and ITM University on 5th October 2019 for acedemic exchange for research in health problems in tribes published in Patrika
                                                and Dainik Bhaskar daily news papers.";
    $lang['news_13']="Interantional day for indigenous population celebration on 19.08.2019 coverage in Nai Duniya daily news paper";
    $lang['news_14']="Medical University recognizes ICMR-NIRTH for PhD- news coverage on 24.03.2019 in Dainik Bhaskar daily news paper";
    $lang['news_15']="Adivasi Swasthya Mela in ICMR-NIRTH - news coverage on 27.02.2019 in Dainik Bhaskar daily news paper";
    $lang['news_16']="Thalessemia workshop in Rani Durgavati Hospital- news coverage on 10.05.2018 in Dainik Bhaskar& Patrika daily news paper";                   
    $lang['news_17']="35th Foundation day programme coverage on 02.03.2018 in Patrika & Hitvada daily news paper";
    $lang['news_18']="Dr Mr & Mrs Amte visit on 17.08.2017 in ICMR-NIRTH coverage in Patrika news paper";
    $lang['news_19']="National Institute for Tribal Health Research, Jabalpur organized a program focused on integrating traditional healing practices with modern healthcare systems. Discussions were held with local healers and practitioners to enhance tribal healthcare services. Certificates and kits were distributed to participants.";
    $lang['news_20']="A seminar on Sickle Cell Disease was conducted under the guidance of Dr. P.N.K. Sharma and NIRTH Jabalpur. Experts emphasized the importance of early diagnosis, effective treatment, and raising awareness to combat this genetic disorder impacting tribal communities.";
    $lang['news_21']="Implementation research for optimizing the comprehensive Sickle Cell Anemia (SCA) care services under the national SCA elimination mission.";
    $lang['news_22']="Union Health Minister  Shri J.P. Nadda urges scientists and researchers to improve tribal health outcomes by studying indigenous practices, traditions, genetic diversity and local healthcare systems during his visit to ICMR–national institute of research in tribal health, jabalpur   <BR>   (date: 24/01/2026)";
    //Circulars
    $lang['Vigilance-Officer-Notification']="Notice Regarding Change of Vigilance Officer";
    $lang['Cashless-Medical-Facility']="Cashless Medical Facility Scheme for Non CGHS employees working in the ICMR Centre.";
    $lang['Hindi-Pakhwada']="Hindi competitions are being organized under Hindi Pakhwada 2022.";
    $lang['Air-Tickets']="Modification of instructions regarding Booking of Air Tickets on Government account.";
    $lang['Promotion']="Promotion of Hindi in office day to day work";
    $lang['nodal-officer']="Nodal Officer- COVID-19";
    $lang['ICMR-Policy']="ICMR Policy on Research Integrity and Publication Ethics";
    $lang['Voluntary-donation']="Voluntary donation";
    $lang['Circular-Publication']="Circular Publication Screening Committee";
    $lang['Format-Publication']="Format Publication Screening Committee";
    $lang['IT-Circular']="IT Circular 2023-24";
    $lang['Hindi-Fortnight23']="Hindi Fortnight Competitions Important Information  18-09-2023";
    $lang['Incentive-scheme']="Incentive scheme for doing noting/drafting originally in Hindi in official work.";
    $lang['Hindi-Fortnight25']="Hindi Fortnight-2025 - Important Information";
 //what is new
  $lang['whats_new']="Whats New";
   $lang['Admissions-Opens']=" Admissions Opens for the PhD Programme";
    //Footer
    $lang['organization']="AGGRIGATIONS & GOVERNING ORGANIZATIONS";
    $lang['Research']="Research & Publication";
    $lang['Ongoing']="Ongoing Research Projects";
    $lang['Scientist']="Scientists";
    $lang['student_staff']="Student & Staff";
}
elseif($language=='hi'){
    $lang['home']="होम";
    $lang['about_us']="हमारे बारे में";
    $lang['icmr']="आईसीएमआर-राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान";
    $lang['who_we_are']="हम कौन हैं और <strong class=\"cs-color\">हम क्या करते हैं?</strong>";
    $lang['about_para1']="आईसीएमआर-राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जिसे पहले क्षेत्रीय जनजातीय चिकित्सा अनुसंधान केंद्र (आरएमआरसीटी) के नाम से जाना जाता था,
1984 में जबलपुर के निकटवर्ती नेताजी सुभाष चंद्र बोस चिकित्सा महाविद्यालय के तीन कमरों में स्थापित हुआ था। आरएमआरसीटी को अप्रैल 2002 में मुख्य भवन में स्थानांतरित कर दिया गया था,
जो 36 एकड़ के हरे-भरे परिसर में फैला हुआ था, और 2014 में इसका वर्तमान नाम (एनआईआरटीएच) कर दिया गया। आईसीएमआर-एनआईआरटीएच का उद्देश्य बुनियादी, अनुप्रयुक्त और परिचालन अनुसंधान के माध्यम से जनजातियों के स्वास्थ्य, पोषण
और शैक्षिक जागरूकता को इस स्तर तक बेहतर बनाना है कि उन्हें देश के वंचित समुदाय न माना जाए।";
$lang['about_para2']="तब से, आईसीएमआर-एनआईआरटीएच ने हीमोग्लोबिनोपैथी, आणविक आनुवंशिकी, आणविक परजीवी विज्ञान, जीनोमिक महामारी विज्ञान,
वायरल निदान, सूक्ष्म जीव विज्ञान, और एक आधुनिक केंद्रीय पशु सुविधा से जुड़ी इन विट्रो अनुसंधान सुविधाओं पर स्थापित प्रयोगशालाओं को समायोजित करने के लिए विकास किया है। आईसीएमआर-एनआईआरटीएच ने पोषण संबंधी विकारों,
हीमोग्लोबिनोपैथी, सामान्य संचारी रोगों, सामाजिक-आर्थिक और जनसांख्यिकीय मुद्दों पर आधारभूत आंकड़े तैयार किए हैं, जिससे मध्य प्रदेश और छत्तीसगढ़ के राज्य स्वास्थ्य
अधिकारियों द्वारा हस्तक्षेपों के विकास और कार्यान्वयन का मार्ग प्रशस्त हुआ है। इसके अलावा, यह जनजातीय आबादी के सामाजिक-आर्थिक, जनसांख्यिकीय और सांस्कृतिक प्रोफाइल की पहचान करने के लिए निरंतर प्रयासरत है,
जिससे समस्या की भयावहता को बढ़ाने वाले विभिन्न कारकों के बारे में बेहतर जानकारी मिलती है। आईसीएमआर-एनआईआरटीएच के प्रमुख अनुसंधान क्षेत्र हीमोग्लोबिनोपैथी, मलेरिया,
जनजातीय आबादी पर विशेष ध्यान देने के साथ, तपेदिक, सहरिया जनजाति पर विशेष ध्यान देने के साथ, सार्वजनिक स्वास्थ्य महत्व के वायरल रोग हैं। मध्य भारत, और स्वास्थ्य संबंधी
जनजातीय आबादी की सामाजिक और व्यवहारिक प्रथाएँ।
<br>
आईसीएमआर-एनआईआरटीएच, सहयोगी केंद्रीय टीबी प्रभाग के साथ सहयोग कर रहा है और बहुऔषधि प्रतिरोधी तपेदिक के निदान के लिए एक आईआरएल (अंतर्राष्ट्रीय क्षय रोग अनुसंधान केंद्र) स्थापित करता है। आईसीएमआर-एनआईआरटीएच एचआईवी/एड्स के निदान,
निगरानी और प्रशिक्षण में नाको (NACO) का समर्थन करता है। आईसीएमआर-एनआईआरटीएच ने ग्वालियर और चंबल संभाग में सहरिया और पीवीटीजी में तपेदिक के अत्यधिक उच्च प्रसार को प्रदर्शित किया है। आईसीएमआर-एनआईआरटीएच ने
सहरिया जनजाति में तपेदिक में कमी को प्रदर्शित किया है और आईसीएमआर-एनआईआरटीएच सहरिया जनजाति में तपेदिक के उन्मूलन के लिए प्रतिबद्ध है। मध्य प्रदेश की जनजातीय आबादी, जिसमें सहरिया आदिम जनजाति भी शामिल है, के बीच किए गए अध्ययनों से राज्य में एक गहन तपेदिक नियंत्रण कार्यक्रम का विकास हुआ। इसने इन क्षेत्रों में टीबी के नियंत्रण के लिए जीएफएटीएम द्वारा एक परियोजना
के शुभारंभ का आधार भी बनाया।
<br>
आईसीएमआर-एनआईआरटीएच ने अपने कार्यान्वयन अनुसंधान के माध्यम से, जनजातीय क्षेत्रों में मलेरिया के प्रभावी नियंत्रण के लिए एक मॉडल विकसित और प्रदर्शित किया है। मध्य प्रदेश के डिंडोरी, बालाघाट और मंडला ज़िलों के। पोषण पूरकता, खाद्य विविधीकरण और सुरक्षित पेयजल के माध्यम से फ्लोरोसिस शमन पर मॉडल को राष्ट्रीय कार्यक्रम में शामिल किया गया है।
<br>
आईसीएमआर-एनआईआरटीएच ने मध्य प्रदेश और छत्तीसगढ़ में हीमोग्लोबिनोपैथी का सूक्ष्म मानचित्रण किया है। संस्थान ने आईसीएमआर और जनजातीय कार्य मंत्रालय (एमओटीए) की संयुक्त पहल के तहत देश के 19 जनजातीय बहुल राज्यों में सिकल सेल एनीमिया के लिए प्रशिक्षण और क्षमता निर्माण का संचालन किया। हाल ही में, स्वास्थ्य एवं परिवार कल्याण मंत्रालय के सहयोग से
और आईसीएमआर-एनआईआरटीएच राष्ट्रीय सिकल सेल एनीमिया उन्मूलन मिशन के लिए प्रशिक्षण मॉड्यूल और परिचालन दिशानिर्देश तैयार करने में शामिल रहा।";
$lang['about_mandate']="आईसीएमआर-एनआईआरटीएच का अधिदेश";
$lang['mandate_content']="<ul>
<li>देश के आदिवासियों की विशिष्ट स्वास्थ्य समस्याओं और स्वास्थ्य आवश्यकताओं को सामने लाने के लिए अनुसंधान की योजना बनाना, उसका संचालन और समन्वय करना।</li>
<li>आदिवासियों में संचारी और गैर-संचारी रोगों का महामारी विज्ञान संबंधी अध्ययन करना।</li>
<li>आदिवासी और अन्य समुदायों में हीमोग्लोबिनोपैथी की जाँच करना।</li>
<li>आदिवासी स्वास्थ्य कार्यक्रमों की योजना बनाने, क्रियान्वयन, निगरानी और मूल्यांकन तथा स्वास्थ्य कर्मियों के प्रशिक्षण में सरकार को सलाह और सहायता प्रदान करना।</li>
</ul>
<p>आईसीएमआर-एनआईआरटीएच का अंतिम लक्ष्य आदिवासियों के बीच स्वास्थ्य, पोषण और स्वास्थ्य जागरूकता में सुधार लाना है

बुनियादी, अनुप्रयुक्त और परिचालन अनुसंधान के माध्यम से इस स्तर तक कि उन्हें देश में स्वास्थ्य अनुसंधान के मामले में वंचित न माना जाए।</p>";

$lang['about_priority']="संस्थान के प्राथमिकता वाले क्षेत्र";
$lang['priority_content']="<ul>
<li>सहारिया क्षय रोग उन्मूलन परियोजना (STEP): क्षय रोग उन्मूलन मिशन की ओर।</li>
<li>चर्चा - सिकल सेल रोग में सामुदायिक समझ और स्वास्थ्य सेवा उपयोग को बढ़ाने के लिए रणनीतियों का डिज़ाइन और कार्यान्वयन।</li>
<li>मध्य प्रदेश की जनजातियों में मेटाबोलिक सिंड्रोम के एपिजेनेटिक निर्धारकों का निर्धारण।</li>
<li>कुष्ठ रोग और क्षय रोग के लिए CRISPR-आधारित पॉइंट-ऑफ-केयर डायग्नोस्टिक्स का विकास।</li>
<li>सामाजिक टीकाकरण दृष्टिकोण के माध्यम से मध्य प्रदेश के विशेष रूप से कमजोर जनजातीय समूहों की सार्वजनिक स्वास्थ्य प्रणाली तक पहुँच में सुधार।</li>
</ul>";

$lang['director_profile']="<p><strong>राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जबलपुर भारतीय आयुर्विज्ञान अनुसंधान परिषद (आईसीएमआर), स्वास्थ्य अनुसंधान विभाग, स्वास्थ्य और परिवार कल्याण मंत्रालय, भारत सरकार के तत्वावधान में कार्यरत देश के 30 स्वास्थ्य अनुसंधान संस्थानों में से एक है। भारत के हृदय प्रदेश कहे जाने वाले मध्य प्रदेश राज्य के हरे-भरे 44 एकड़ के परिसर में फैला आईसीएमआर-एनआईआरटीएच, घने जंगलों से घिरा हुआ आदिवासी बहुल इलाका है, और यह एकमात्र सार्वजनिक रूप से वित्त पोषित संगठन है, जो देश की जनजातियों के स्वास्थ्य पर शोध के लिए समर्पित है। जनजातीय समुदायों के स्वास्थ्य पर ध्यान देना प्रमुख राष्ट्रीय महत्व है, विभिन्न प्रशिक्षण और विशेषज्ञता के साथ आईसीएमआर-एनआईआरटीएच के बायोमेडिकल वैज्ञानिक, जो 100 से अधिक तकनीकी कर्मचारियों और विभिन्न समयबद्ध अनुसंधान परियोजनाओं के कई वैज्ञानिक कर्मचारियों द्वारा समर्थित हैं, राज्य सरकार के स्वास्थ्य अधिकारियों के साथ सहयोग में अथक प्रयास कर रहे हैं, न केवल इन जनजातियों में प्रचलित विभिन्न रोगों का निदान और हस्तक्षेप करने के लिए, बल्कि आधुनिक औजारों का उपयोग करते हुए और उच्च तकनीक की बायोमेडिकल रिसर्च करने हेतु रोगों के तंत्र को समझने के लिए, ताकि इनकी रोकथाम और नियंत्रण के वास्तविक तरीकों को विकसित किया जा सके। इसके अलावा, आईसीएमआर-एनआईआरटीएच के सामाजिक वैज्ञानिक नियमित रूप से विभिन्न जनजातीय समुदायों के साथ रोग निवारक उपायों पर अभियान चलाने के लिए परस्पर कार्य कर रहे हैं, जिससे समुदायों में बड़े पैमाने पर इनके प्रसार से पहले ही स्वास्थ्य संबंधी मुद्दों को कम किया जा सके।</strong>
<br><br><br>
अनुसंधान गतिविधियों को सुचारू बनाने के लिए, आईसीएमआर-एनआईआरटीएच के वैज्ञानिक और तकनीकी कर्मी अपने प्रशिक्षण और विशेषज्ञता के आधार पर विभिन्न प्रभागों के छह अलग-अलग छोटे समूह बनाते हैं; जैसे कि संक्रामक रोग, आनुवांशिक विकार, गैर-संक्रामक रोग, सामाजिक विज्ञान और नृजाति चिकित्साविज्ञान, वेक्टर जनित रोग और वायरल तथा जूनोटिक रोग। आईसीएमआर-एनआईआरटीएच न केवल इस क्षेत्र के जनजाति और गैर-जनजाति आबादी हेतु कई बीमारियों के लिए अत्यधिक संवेदनशील तरीकों का उपयोग करते हुए, निःशुल्क प्रयोगशाला आधारित नैदानिक सुविधाएं प्रदान करता है; बल्कि व्यक्तिगत सुरक्षा, रोकथाम और रोगों पर नियंत्रण के लिए रोगियों और उनके रिश्तेदारों को नियमित परामर्श भी प्रदान किया जाता है। इसके अलावा, आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों और तकनीकी कर्मचारियों की टीम नियमित रूप से दुर्गम जनजातीय क्षेत्रों में स्थल दौरे करती हैं, ताकि समुदायों में विभिन्न बीमारियों के फैलने पर सर्वेक्षण किया जा सके, और जहां कहीं भी जरूरत पड़े मरीजों का इलाज करने में स्थानीय स्वास्थ्य सुविधाओं से उन्हें मदद मिल सके। वे एक साथ जैविक नमूने भी एकत्र करते हैं, जो समाधान और नियंत्रण खोजने के लिए अनुसंधान के लिए कच्चे संसाधन का गठन करते हैं, जिससे जनजातियों के स्वास्थ्य का बेहतर प्रबंधन किया जा सकता है।
<br><br><br>
जनजातीय स्वास्थ्य के क्षेत्र में अत्यधिक प्रतिबद्ध अनुसंधान के लिए आईसीएमआर-एनआईआरटीएच को विश्व स्वास्थ्य संगठन (डब्ल्यूएचओ), जिनेवा द्वारा प्रतिष्ठित ‘‘जनजातीय आबादी के स्वास्थ्य पर शोध हेतु सहयोग केन्द्र’’ के रूप में सम्मानित किया गया है। इसके अलावा, आईसीएमआर-एनआईआरटीएच ‘‘ट्राइबल हेल्थ रिसर्च फोरम’’ के समन्वय संस्थान के रूप में कार्य करता है, जो आईसीएमआर द्वारा गठित है और यह इस कार्य में सहभागी आईसीएमआर संस्थानों के बीच, आदिवासी स्वास्थ्य पर अनुसंधान का सामन्जस्य करने हेतु जिम्मेदार है, जो भारत में स्थानीय जनजातियों के स्वास्थ्य पर कार्य कर रहे हैं। अपनी स्थापना के इन 32 वर्षों में, आईसीएमआर-एनआईआरटीएच ने देश के स्वास्थ्य अनुसंधान उत्पादन में विशेष रूप से योगदान दिया है, विशेष तौर पर जनजातीय स्वास्थ्य पर प्रकाशनों, मोनोग्राफों के रूप में अनुसंधान के प्रसार और अनुसंधान/विकास आधारित स्वास्थ्य नीतियों के निर्माण के माध्यम से। आईसीएमआर-एनआईआरटीएच की भौगोलिक अवस्थिति और बायोमेडिकल तथा सामाजिक वैज्ञानिक अनुसंधान के लिए जबरदस्त सुविधाओं के कारण ही यह संभव हो सका है, जो कि आईसीएमआर नेतृत्व द्वारा सृजित किया गया है, और जो आज तक जारी है। यही कारण है कि राष्ट्रीय और अंतर्राष्ट्रीय ख्याति के वैज्ञानिक आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों के साथ हाथ मिलाने और विशेषज्ञता साझा करने के लिए आकर्षित हो रहे हैं, जिससे सहयोगी अनुसंधान का एक मजबूत नेटवर्क का निर्माण हो सके और साथ ही जनजातियों में काफी हद तक प्रचलित कई बीमारियों से संबंधित निदान का मूल्यांकन और टीकों आदि का परीक्षण किया जा सके।
<br><br><br>
उत्साही युवा पेशेवरों का प्रभावी एकीकरण और प्रतिबद्ध योगदान प्रत्येक संगठन की विकास की कुंजी है, विशेष रूप से आईसीएमआर-एनआईआरटीएच जैसे वैज्ञानिक अनुसंधान संस्थानों के लिए। चिकित्सा, जैविक, सामाजिक और प्राकृतिक वैज्ञानिकों के रूप में मेहनती और प्रतिबद्ध युवा जो आदिवासी स्वास्थ्य अनुसंधान के लिए एक प्रभाव बनाना चाहते हैं, ऐसे युवाओं को आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों के साथ हाथ मिलाने के लिए आमंत्रित किया जाता है ताकि जनजातियों के स्वास्थ्य संबंधी समस्याओं को कम किया जा सके, और भारत के माननीय प्रधानमंत्री के ‘मेक इन इंडिया फॉर हेल्दी इंडिया’ अभियान में योगदान दिया जा सके। 
</p>
                               <h5 class=\"text-right\">डॉ. अपरूप दास<br>
    <small>निदेशक, आईसीएमआर-एनआईआरटीएच</small></h5>";
    $lang['director_academic_title']="डॉ. अपरूप दास का शैक्षणिक प्रोफाइल";
    $lang['director_academic_profile']=" डॉ. अपरूप दास प्रशिक्षित जनसंख्या आनुवंशिकीविद् और आणविक विकासवादी जीवविज्ञानी हैं। उन्होंने जीनोमिक्स और डीएनए अनुक्रम विश्लेषण पर अपने व्यापक प्रशिक्षण और अनुभव को कार्यान्वित किया है, शुरूआत में ड्रोसोफिला और बाद में मलेरिया में; साथ ही उन्होंने भारत और अफ्रीका में मलेरिया महामारी विज्ञान को समझने के लिए इन आधुनिक जैविक तकनीकों को लागू किया है। भुवनेश्वर के उत्कल विश्वविद्यालय से जूलॉजी (प्राणि विज्ञान) में स्नातक और स्नातकोत्तर उपाधि प्राप्त करने और बनारस हिंदू विश्वविद्यालय, वाराणसी से डॉक्टरेट की उपाधि प्राप्त करने के पश्चात डॉ. दास जर्मनी के म्यूनिख स्थित लुडविग मैक्सिमिलियन विश्वविद्यालय में चार वर्षीय पोस्ट-डॉक्टरेट अध्ययन के लिए गए, जहाँ उन्होंने जीनोमिक्स और जैव सूचना विज्ञान में प्रशिक्षण प्राप्त किया। वर्ष 2005 में भारत वापस आने के बाद, वे नई दिल्ली में आईसीएमआर- राष्ट्रीय मलेरिया अनुसंधान संस्थान, नई दिल्ली में वह एक वैज्ञानिक के रूप में शामिल हुए, जहाँ उन्होंने 12 वर्ष तक मलेरिया की आणविक महामारी विज्ञान का अध्ययन करके सेवा की। मई 2016 में, उन्होंने आईसीएमआर-चिकित्सा कीट विज्ञान अनुसंधान केंद्र, मदुरै, तमिलनाडु में निदेशक के रूप में कार्यभार ग्रहण किया और उसके बाद आईसीएमआर-राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान के निदेशक के रूप में यहां स्थानांतरित हुए। भारत और कैमरून (अफ्रीका) में मलेरिया की आणविक महामारी विज्ञान (मौलेक्यूलर ऐपिडेमायोलॉजी) पर उनके अनुसंधान के 14 वर्ष की अवधि में डॉ. दास और उनके अनुसंधान समूह ने मलेरिया परजीवी, दवा प्रतिरोध, मिश्रित प्रजातियों के संक्रमण, मच्छर वैक्टर की जनसंख्या की गतिशीलता, मलेरिया होने की संवेदनशीलता और मलेरिया से संबंधित फार्माकोजेनोमिक्स की कई दिलचस्प आनुवंशिक विशेषताओं को उजागर किया था।
<br><br>
    डॉ. दास को कई राष्ट्रीय और अंतर्राष्ट्रीय पुरस्कारों से सम्मानित किया गया है और ड्रोसोफिला और मलेरिया मॉडल, दोनों पर राष्ट्रीय और अंतर्राष्ट्रीय वैज्ञानिकों को सम्मिलित करने वाली कई शोध परियोजनाओं में शामिल किया गया है। उन्होंने जनसंख्या और विकासवादी आनुवंशिकी और जीनोमिक्स में 100 से अधिक प्रकाशनों का लेखन किया है, और 12 पीएचडी और 70 से अधिक स्नातकोत्तर शोध का पर्यवेक्षण व मार्गदर्शन किया है। उन्होंने वर्ष 2010 और 2017 में मलेरिया जीनोमिक्स पर दो 15-दिवसीय ग्लोबल एक्सचेंज व्याख्यान पाठ्यक्रम सहित कई राष्ट्रीय और अंतर्राष्ट्रीय कार्यशालाओं/बैठकों का आयोजन किया है, जो कि यूरोपीय आणविक जीवविज्ञान संगठन (ईएमबीओ), जर्मनी द्वारा वित्त पोषित किया गया था। वे कई उच्च प्रभाव वाली अंतर्राष्ट्रीय पत्रिकाओं के संपादक के रूप में सेवारत हैं, और लगातार कई प्रतिष्ठित राष्ट्रीय और अंतरराष्ट्रीय पत्रिकाओं की पांडुलिपियों की समीक्षा करते हैं। 
    <br><br>
    वर्तमान में डॉ. दास और उनका समूह दो अलग-अलग प्रमुख अंतरराष्ट्रीय परियोजनाओं में शामिल हैं; एक जो भारत में जटिल मलेरिया को उजागर करने के लिए नेशनल इंस्टीट्यूट ऑफ हेल्थ, यूएसए द्वारा वित्त पोषित है, और दूसरे को भारत-कनाडा सेंटर फॉर इनोवेटिव मल्टीडिसिप्लिनरी पार्टनर्स फॉर एक्सीलरेट कम्युनिटी ट्रांसफॉर्मेशन एंड सस्टेनेबिलिटी (आईसी-इम्पैक्ट्स) द्वारा वित्त पोषित किया गया है, जो मलेरिया निदान के लिए स्वास्थ्य देखभाल बिंदु को विकसित करने पर कार्य कर रहा है। डॉ. दास चिकित्सा पद्धति में पारंपरिक जनजातीय ज्ञान का लाभ उठाने और आधुनिक चिकित्सा पद्धति हेतु ज्ञान का रूपांतरण करने में रुचि रखते हैं। डॉ. दास का अंतिम उद्देश्य भारतीयों में जनसंख्या जीनोमिक जानकारी का उपयोग करना और आधुनिक निदान और उपचार के माध्यम से भारत में विकासवादी (व्यक्तिगत) दवा तैयार करना है।
    ";
    
    
     $lang['director_academic_title1']="डॉ. राजनारायण आर. तिवारी का शैक्षणिक प्रोफाइल";
    $lang['director_academic_profile1']="डॉ. राजनारायण आर. तिवारी एक सामुदायिक चिकित्सक हैं, जिन्होंने सरकारी मेडिकल कॉलेज, नागपुर से प्रिवेंटिव और सोशल मेडिसिन में एम.डी. और गुजरात विश्वविद्यालय से लाइफ साइंसेज में पी.एच.डी. की डिग्री प्राप्त की है। इसके अलावा, उनके पास लोक प्रशासन, अर्थशास्त्र और समाजशास्त्र में मास्टर डिग्री भी है। उन्होंने इंदिरा गांधी मेडिकल कॉलेज, नागपुर में लेक्चरर के रूप में अपना करियर शुरू किया और फिर 2000 में वैज्ञानिक के रूप में अहमदाबाद के नेशनल इंस्टीट्यूट ऑफ ऑक्यूपेशनल हेल्थ में चले गए, जहाँ उन्होंने 2015 तक काम किया। वे भारत सरकार के खान मंत्रालय के एक संस्थान नेशनल इंस्टीट्यूट ऑफ माइनर्स हेल्थ नागपुर के पूर्व निदेशक और आईसीएमआर-नेशनल इंस्टीट्यूट ऑफ ऑक्यूपेशनल हेल्थ, अहमदाबाद के पूर्व निदेशक (अतिरिक्त प्रभार) हैं। <br><br>

डॉ. तिवारी वर्तमान में आईसीएमआर-नेशनल इंस्टीट्यूट फॉर रिसर्च इन एनवायर्नमेंटल हेल्थ (एनआईआरईएच), भोपाल के निदेशक हैं, साथ ही आईसीएमआर-नेशनल इंस्टीट्यूट ऑफ रिसर्च इन ट्राइबल हेल्थ, जबलपुर के निदेशक का अतिरिक्त प्रभार भी उनके पास है। <br><br>

डॉ. तिवारी ने व्यावसायिक स्वास्थ्य पर व्यापक रूप से काम किया है, जिसमें सिलिकोसिस, एस्बेस्टोसिस और कोयला श्रमिकों के न्यूमोकोनियोसिस जैसे व्यावसायिक धूल से संबंधित फेफड़ों के विकार, कामकाजी बच्चों के व्यावसायिक खतरे और व्यावसायिक स्वास्थ्य जनशक्ति के विकास पर ध्यान केंद्रित किया गया है। वर्तमान में, वे वायु प्रदूषण से संबंधित शोध, मध्य प्रदेश के लिए योग्यता आधारित पर्यावरणीय स्वास्थ्य संसाधन और संदर्भ विशिष्ट ताप कार्य योजना विकसित करने में शामिल हैं।<br><br>

राष्ट्रीय और अंतर्राष्ट्रीय पत्रिकाओं में व्यावसायिक, पर्यावरणीय और सार्वजनिक स्वास्थ्य के क्षेत्र में उनके 283 शोध प्रकाशन हैं। वे दो पुस्तकों के संपादक भी हैं, जिनका शीर्षक है

“पर्यावरण और व्यावसायिक जोखिम: प्रजनन हानि” और “पर्यावरण स्वास्थ्य में हालिया रुझान” और कई राष्ट्रीय और अंतर्राष्ट्रीय सहकर्मी-समीक्षित पत्रिकाओं के समीक्षक। उन्होंने 42 एएफआईएच छात्रों और 26 एमपीएच ईओएच छात्रों को उनके शोध प्रबंध/थीसिस कार्य के लिए मार्गदर्शन भी दिया है। वे मणिपाल विश्वविद्यालय, भारतीय जन स्वास्थ्य संस्थान गांधीनगर, आईसीएमआर-राष्ट्रीय व्यावसायिक स्वास्थ्य संस्थान, अहमदाबाद और आईएसटीएआर आनंद में व्यावसायिक और पर्यावरणीय स्वास्थ्य के सहायक/विजिटिंग फैकल्टी हैं।<br><br>

उन्होंने राष्ट्रीय और अंतर्राष्ट्रीय एजेंसियों द्वारा प्रायोजित व्यावसायिक और पर्यावरणीय स्वास्थ्य से संबंधित 33 परियोजनाओं पर प्रिंसिपल और सह-अन्वेषक के रूप में काम किया है। उनके काम को डब्ल्यूएचओ फेलोशिप, आईएपीएसएम के फेलोशिप पुरस्कार और आईपीएचए के फेलोशिप पुरस्कार के माध्यम से मान्यता मिली है। वे व्यावसायिक और पर्यावरणीय स्वास्थ्य के क्षेत्र में देश में राष्ट्रीय आयुर्विज्ञान अकादमी के एकमात्र फेलो हैं। वे राष्ट्रीय विज्ञान अकादमी (भारत), राष्ट्रीय पर्यावरण विज्ञान अकादमी और भारतीय महामारी विज्ञान फाउंडेशन के आजीवन सदस्य भी हैं। 2014 में, उन्हें सामुदायिक चिकित्सा के क्षेत्र में शोध कार्य के लिए आईसीएमआर राष्ट्रीय पुरस्कार से सम्मानित किया गया था। भारत और गुजरात में व्यावसायिक स्वास्थ्य जनशक्ति के विकास में उनके योगदान के सम्मान में, उन्हें 2013 में गुजरात सरकार के औद्योगिक सुरक्षा और स्वास्थ्य निदेशालय द्वारा मानद एएफआईएच से सम्मानित किया गया था। 2024 में, उन्हें भारतीय व्यावसायिक स्वास्थ्य संघ द्वारा जेसी कोठारी ओरेशन पुरस्कार मिला।";
    
    
    $lang['from_the_director_desk']="निदेशक की डेस्क से";

    $lang['abdul_kalam_quote']="<p>अंततः, वास्तविक अर्थों में शिक्षा सत्य की खोज है। यह ज्ञान और आत्मज्ञान से होकर गुजरने वाली एक अंतहीन यात्रा हैं।</p>
    <span>ए. पी. जे. अब्दुल कलाम</span>";
    
    // former directors
    $lang['leadership_title']="आईसीएमआर–एनआईआरटीएच, जबलपुर का नेतृत्व";
    $lang['s_d_verma']="डॉ. एस.डी. वर्मा";
    $lang['y_n_mathur']="डॉ. वाई.एन. माथुर";
    $lang['b_n_saxena']="डॉ. बी.एन. सक्सेना";
    $lang['r_s_tiwary']="डॉ. आर.एस. तिवारी";
    $lang['neeru_singh']="डॉ. नीरू सिंह";
    $lang['a_p_das']="डॉ. ए.पी. दास";
    $lang['m_a_ansari']="डॉ. एम.ए. अंसारी";
    $lang['aprup_das']="डॉ. अपरूप दास";
    $lang['r_r_tiwari']="डॉ. राजनारायण आर. तिवारी";
    $lang['bontha_babu']="डॉ. बोंथा वी. बाबू";
    $lang['rajiv_bahl']="डॉ. राजीव बहल";

    $lang['project_director']="परियोजना निदेशक";
    $lang['officer_in_charge']="प्रभारी अधिकारी";
    $lang['director_additional_charge']="निदेशक (अतिरिक्त प्रभार)";
    $lang['director_general']="महानिदेशक, आई.सी.एम.आर";
    $lang['director']="निदेशक";
    $lang['oic_director']="ओआईसी / निदेशक";
    
    $lang['director_incharge']="निदेशक अतिरिक्त प्रभार";
    
    //menu items
    $lang['career_opportunity']="रोजगार के अवसर";
    $lang['tenders']="निविदाएं";
    $lang['announcement']="घोषणाएं";
    $lang['employees_corner']="कर्मचारी कॉर्नर";
    $lang['rti']="आर टी आई";
    $lang['contact_us']="संपर्क करें";
    $lang['about']="हमारे बारे में";
    $lang['profile']="प्रोफ़ाइल";
    $lang['directors_desk']="निर्देशक की डेस्क";
    $lang['leadership_nirth']="एनआईआरटीएच, जबलपुर का नेतृत्व";
    $lang['staff_list']="स्टाफ सूची";
    $lang['research']="अनुसंधान";
    $lang['scientist']="वैज्ञानिक";
    $lang['publication']="प्रकाशन";
    $lang['media']="मीडिया";
    $lang['press_release']="प्रेस विज्ञप्ति";
    $lang['photo_gallery']="फोटो गैलरी";
    $lang['video_gallery']="वीडियो गैलरी";
    $lang['nirth_news']="समाचारों में";
    $lang['latest_research']="नवीनतम शोध";
    $lang['profiles']="प्रोफाइल";
    $lang['institutional_publications']="संस्थागत प्रकाशन";
    $lang['old_website']="पुरानी वेबसाइट";
    $lang['about_nirth']="एनआईआरटीएच";
    $lang['useful_links']="उपयोगी लिंक्‍स";
    $lang['newsletter']="न्यूज़ लेटर";
    $lang['address']="एनआईआरटीएच भवन, नागपुर रोड  पोस्ट-गढा, जबलपुर - 482 003, मध्य प्रदेश, भारत";
    $lang['nirth']="एनआईआरटीएच";
    $lang['main_campus']="मुख्य परिसर";
    $lang['old_name']="पूर्व नाम: क्षेत्रीय जनजातीय आयुर्विज्ञान अनुसंधान केन्द्र (आरएमआरसीटी)";
    $lang['indian_council_of_medical_research']="भारतीय आयुर्विज्ञान अनुसंधान परिषद";
    $lang['department_of_health_research']="स्‍वास्‍थ्‍य अनुसंधान विभाग";
    $lang['ministry_of_health_family_welfare']="स्‍वास्‍थ्‍य एवं परिवार कल्याण विभाग";
    $lang['ministry_of_tribal_affairs']="जनजातीय कार्य मंत्रालय";

    //home page
    $lang['vacancies']="रिक्त पद";
    $lang['vacancies_permanent']="स्थायी रिक्त पद";
    $lang['vacancies_project']="अस्थायी रिक्त पद";
   $lang['employee_links']="कर्मचारी लिंक";
    $lang['whatsnew']="नया क्या है";
    $lang['research_division']="अनुसंधान प्रभाग";
    $lang['nirth_profile']="NIRTH प्रोफाइल";
    $lang['admit_card']="प्रवेश पत्र";
    $lang['result']="परिणाम";
    $lang['downloads']="डाउनलोड";
    $lang['sophisticated_analytical_instrument_facility']="परिष्‍कृत विश्‍लेषणात्‍मक उपकरण सुविधा";
    $lang['student_corner']="स्टूडेंट कॉर्नर";
    $lang['adjunct_faculty_scheme_icmr']="भा.आ.अ.प. की अनुबद्ध प्राध्यापक योजना";
    $lang['readmore']="अधिक पढ़ें";
    $lang['view_profile']="प्रोफाइल देखिये";
    $lang['view_All']="सभी देखें";
    $lang['corona_activities']="आईसीएमआर-एनआईआरटीएच द्वारा कोरोना गतिविधियां";

    $lang['director_profile_short']="राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जबलपुर भारतीय स्वास्थ्य अनुसंधान परिषद (आईसीएमआर), स्वास्थ्य अनुसंधान विभाग, स्वास्थ्य और परिवार कल्याण मंत्रालय, भारत सरकार के तत्वावधान में कार्यरत देश के 30 स्वास्थ्य अनुसंधान संस्थानों में से एक है। भारत के हृदय प्रदेश कहे जाने वाले मध्य प्रदेश राज्य के हरे-भरे 44 एकड़ के परिसर में फैला आईसीएमआर-एनआईआरटीएच, घने जंगलों से घिरा हुआ आदिवासी बहुल इलाका है, और यह एकमात्र सार्वजनिक रूप से वित्त पोषित संगठन है, जो देश की जनजातियों के स्वास्थ्य पर शोध के लिए समर्पित है।";
    $lang['research_training']="अनुसंधान और प्रशिक्षण";
    $lang['ongoing_projects']="जारी परियोजनाएं";
    
    $lang['director_general_profile']="सचिव, भारत सरकार, स्वास्थ्य अनुसंधान विभाग और महानिदेशक, भारतीय चिकित्सा अनुसंधान परिषद";
    
    //departments
    $lang['vector_borne_diseases']="वेक्टर जनित रोग";
    $lang['communicable_diseases']="संक्रामक रोग";
    $lang['non_communicable_diseases']="गैर-संक्रामक रोग";
    $lang['genetic_disorders']="आनुवांशिक विकार";
    $lang['virology_zoonotic_diseases']="विषाणु विज्ञान एवं जूनोटिक रोग";
    $lang['social_science_ethnomedicine']="सामाजिक विज्ञान और नृजाति चिकित्साविज्ञान";
    $lang['in_vivo_research']="इन-विवो अनुसंधान";
    $lang['reception']="स्वागत कक्ष (रिसेप्शन)";
    $lang['office_director']="निदेशक कार्यालय";
    $lang['scientific']="वैज्ञानिक";
    $lang['technical']="तकनीकी";
    $lang['administration']="प्रशासन";
    $lang['support']="सहयोग";
    $lang['vehicle_section']="वाहन अनुभाग";
    $lang['division']="विभाग";
    $lang['scientific_divisions']="वैज्ञानिक    ";

    //scientist profile
    $lang['email']="ईमेल";
    $lang['phone']="फ़ोन";
    $lang['scientific_profile']="प्रोफाइल";
    $lang['research_interests']="शोध के विषय";
    $lang['scientific_staff']="वैज्ञानिक कर्मचारी";
    $lang['past_research_students']="विगत शोध छात्र";
    $lang['ongoing_research_projects']="जारी अनुसंधान परियोजनाएं";
    $lang['current_research_collaborators']="वर्तमान अनुसंधान सहयोगी";
    $lang['past_research_collaborators']="विगत अनुसंधान सहयोगी";
    $lang['research_in_news']="समाचार में शोध";
    $lang['award_recognition_honours']="पुरस्कार / मान्यता / सम्मान";
    $lang['workshop_conference_organized']="संगठित कार्यशाला / सम्मेलन";
    $lang['academic_contributions']="शैक्षणिक योगदान";
    $lang['research_grants']="अनुसंधान अनुदान";
    $lang['publications']="प्रकाशन";
    $lang['s_profile']=" का प्रोफाइल";
    $lang['circular']="परिपत्र";
    $lang['novel_corona']="नोवेल कोरोना वायरस का निदान";
    $lang['corona_activities']="भा.आ.अ.प. की कोरोना गतिविधियां";
    $lang['committee']="समिति";
     $lang['phd_program']="एसीएसआईआर पीएचडी कार्यक्रम"; 
    
    $lang['head1']="परिणाम - पीएचडी के लिए शॉर्टलिस्ट किए गए उम्मीदवार";
    $lang['head2']="परिणाम - पीएचडी कार्यक्रम के लिए चयनित उम्मीदवार";
    $lang['email_change']="महत्वपूर्ण सूचना: ईमेल पता परिवर्तन";
    $lang['marquee1']="ACSIR पीएचडी कार्यक्रम (जनवरी 2025 सत्र) के लिए चयनित उम्मीदवार";
    $lang['marquee2']="विज्ञापन : एसीएसआईआर पीएचडी कार्यक्रम (अगस्त 2025 सत्र)";
    $lang['email_change_matter']="कृपया ध्यान रखें कि निम्नलिखित ईमेल पते अब परिचालन में नहीं रहेंगे:
   
    <br><br>
    <ul>
        <strong>
        <li>director@nirth.res.in</li>
        <li>aparupdas@nirth.res.in</li>
        </strong>
    </ul>
    <br>तत्काल प्रभाव से, इन पतों पर भेजे गए किसी भी पत्राचार को प्राप्त या संबोधित नहीं किया जाएगा। 
    <br>भविष्य के सभी संचारों के लिए, कृपया हमारी वेबसाइट पर दी गई अद्यतन संपर्क जानकारी का उपयोग करें या सहायता के लिए <strong>  director-nirth[at]icmr[dot]gov[dot]in </strong>से संपर्क करें।
    <br>इसके कारण होने वाली किसी भी असुविधा के लिए हम क्षमा चाहते हैं और इस मामले पर आपके ध्यान की सराहना करते हैं।
    <br><br>
    आपके सहयोग के लिए धन्यवाद।";
        //Student's Corner

     $lang['msc-dissertation-training-programme']="परिणाम - एम.एस.सी. शोध कार्यक्रम 2024-2025";
     $lang['registration']="पंजीकरण";
     $lang['Entomology']="2022-24 बैच के लिए सार्वजनिक स्वास्थ्य कीट विज्ञान में प्रवेश के लिए दो वर्षीय स्नातकोत्तर पाठ्यक्रम एम.एससी.";
     $lang['CCRAS']="सीसीआरएएस पोस्ट डॉक्टोरल फ़ेलोशिप योजना";
     $lang['Advertisement']="एसीएसआईआर के सहयोग से आईसीएमआर-एनआईआरटीएच पीएचडी के लिए आवेदन आमंत्रित करता है। जनवरी 2025 सत्र का कार्यक्रम";
     $lang['Advertisement-Aug-2025']="आईसीएमआर-एनआईआरटीएच ने एसीएसआईआर के सहयोग से अगस्त 2025 सत्र के लिए पीएच.डी. कार्यक्रम के लिए आवेदन आमंत्रित किए हैं।";
     $lang['Advertisement-CLOSED']="आईसीएमआर-एनआईआरटीएच (एसीएसआईआर से संबद्ध) ने पीएचडी के लिए प्रवेश की घोषणा की है। शैक्षणिक सत्र अगस्त 2024 के लिए चिकित्सा अनुसंधान में";
     $lang['Advertisement-btn']="विज्ञापन";
     $lang['Advertisement1']="पीएचडी कार्यक्रम के लिए शॉर्टलिस्ट किए गए उम्मीदवारों की सूची - अगस्त 2024 सत्र";
     $lang['Advertisement2']="पीएचडी कार्यक्रम के लिए शॉर्टलिस्ट किए गए उम्मीदवारों की सूची - जनवरी 2025 सत्र";
     $lang['PHD_Notice_August2025']="सूचना: केंद्रीकृत पीएचडी प्रवेश साक्षात्कार – अगस्त 2025 सत्र";
     $lang['viewlist']="सूची देखें";
     $lang['result-1']=" परिणाम: एसीएसआईआर पीएचडी कार्यक्रम - अगस्त 2024 सत्र के लिए चयनित उम्मीदवार";
     $lang['result-2']=" परिणाम: एसीएसआईआर पीएचडी कार्यक्रम - जनवरी 2025 सत्र के लिए चयनित उम्मीदवार";
     $lang['result-btn']="परिणाम";

  
   //Employee's Corner
    
    $lang['casual-leave']="आकस्मिक अवकाश";
    $lang['download']="डाउनलोड "; 
    $lang['charge-report']="आरोप रिपोर्ट";
    $lang['child-care-leave']="बच्चे की देखभाल की छुट्टी";
    $lang['gate-pass']="गेट पास";
    $lang['Earned-Leave']="अर्जित अवकाश";
    $lang['ltc-form']="एलटीसी फॉर्म";
    $lang['Medical-Reimburshment-Form-A']="चिकित्सा प्रतिपूरर्ति फर्म ए	";
    $lang['Medical-Reimburshment-Form-B']="चिकित्सा प्रतिपूर्ति प्रपत्र बी	";
    $lang['POL-Advance-Form']="आकस्मिक / पीओएल एडवांस फॉर्म	";
    $lang['POL-Adjustment-Form']="आकस्मिक / पीओएल समायोजन प्रपत्र	";
    $lang['Vehicle-Request-Form']="वाहन अनुरोध प्रपत्र";
    $lang['TA/DA-Adjustment-Form']="टीए/डीए समायोजन प्रपत्र";
    $lang['LTC-Adjustment-Form']="एलटीसी समायोजन फॉर्म";
    $lang['Tour-Programme-Form']="भ्रमण कार्यक्रम प्रपत्र";
    $lang['POL-Advance-Form1']="टीए/डीए व्यय प्रमाणपत्र"; 
    $lang['TA/DA-Expenditure-Certificate']="टीए/डीए प्रमाणपत्र";
    $lang['Tution-Fee-Reimburshment-Form']="ट्यूशन शुल्क प्रतिपूर्ति प्रपत्र";
    $lang['GPF-Advance-Form']="जीपीएफ एडवांस फॉर्म";
    $lang['GPF-Withdrawl-Form']="जीपीएफ-निकासी-फॉर्म	";
    $lang['Unfit/Fitness-Form']="अनफिट/फिटनेस फॉर्म";
    $lang['Material-Indent-Form']="सामग्री इंडेंट प्रपत्र";
    $lang['Honorarium-Form']="मानदेय प्रपत्र";
    $lang['Mandate-Form']="अधिदेश प्रपत्र	";
    $lang['Holdays_25']="छुट्टियों की सूची 2025	";
    $lang['Holdays_26']="छुट्टियों की सूची 2026	";

  //Photo Gallery Materials
    $lang['photo-gallery1']="हर साल 8 मई को अंतर्राष्ट्रीय थैलेसीमिया दिवस मनाया जाता है ताकि इस आनुवंशिक रक्त विकार के बारे में जागरूकता बढ़ाई जा सके। थैलेसीमिया हीमोग्लोबिन के उत्पादन को प्रभावित करता है, जिससे एनीमिया और अन्य स्वास्थ्य संबंधी जटिलताएँ होती हैं। इस वर्ष के आयोजन का विषय है जीवन को सशक्त बनाना, प्रगति को अपनाना: सभी के लिए समान और सुलभ थैलेसीमिया उपचार जो सभी व्यक्तियों के लिए थैलेसीमिया उपचार तक समान पहुँच पर जोर देता है, चाहे उनका स्थान या आर्थिक स्थिति कुछ भी हो। इस लक्ष्य के अनुरूप, ICMR-राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान (NIRTH) ने 8 मई 2024 को एक व्यावहारिक कार्यशाला का आयोजन किया। कार्यशाला में थैलेसीमिया और वंशानुगत हीमोग्लोबिन विकारों के निदान पर ध्यान केंद्रित किया गया। चिकित्सा पेशेवरों, शोधकर्ताओं और वैज्ञानिकों सहित विभिन्न क्षेत्रों के विशेषज्ञ ज्ञान और अंतर्दृष्टि साझा करने के लिए एकत्र हुए। थैलेसीमिया और अन्य हीमोग्लोबिनोपैथी की जांच और निदान जैसे विषयों पर विस्तार से चर्चा की गई, जिसमें एचपीएलसी के परिणामों की व्याख्या पर विशेष जोर दिया गया। कार्यशाला का उद्देश्य स्वास्थ्य पेशेवरों को थैलेसीमिया का सटीक निदान करने और समय पर हस्तक्षेप करने के लिए आवश्यक उपकरणों से लैस करना था। कार्यशाला में 180 से अधिक प्रतिनिधियों ने भाग लिया।";
    $lang['photo-gallery2']="आईसीएमआर-राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान, जबलपुर में 12 से 14 जून, 2024 तक <b>चिकित्सा अनुसंधान में जैव सांख्यिकी के अनुप्रयोग</b> पर तीन दिवसीय कार्यशाला आयोजित की गई। इस कार्यशाला का प्राथमिक उद्देश्य जैव सांख्यिकी में अनुप्रयोगों और व्यावहारिक चुनौतियों पर अंतःविषय चर्चा को बढ़ावा देना है, जो अंततः साक्ष्य-आधारित निर्णय लेने और बेहतर स्वास्थ्य सेवा परिणामों में योगदान देगा। इस कार्यक्रम में मुख्य अतिथि, स्वास्थ्य अनुसंधान विभाग के सचिव और आईसीएमआर के महानिदेशक डॉ. राजीव बहल शामिल हुए। अपने संबोधन में उन्होंने चिकित्सा अनुसंधान में जैव सांख्यिकी की महत्वपूर्ण भूमिका पर जोर दिया और स्वास्थ्य सेवा क्षेत्र में इसके अनुप्रयोग के महत्व को रेखांकित किया। कार्यशाला में शामिल प्रमुख विषय हैं बायोस्टैटिस्टिक्स का परिचय, बुनियादी सांख्यिकीय अवधारणाएँ, परिकल्पना परीक्षण, शोध अध्ययन डिज़ाइन और नमूनाकरण तकनीक, सहसंबंध और प्रतिगमन, नमूना आकार अनुमान, उन्नत बायोस्टैटिस्टिकल तकनीक, अनुमानात्मक सांख्यिकी और खोजपूर्ण डेटा विश्लेषण और मिनीटैब, एसपीएसएस और एक्सेल जैसे सॉफ़्टवेयर पैकेजों के साथ व्यावहारिक सत्र। कार्यशाला में विभिन्न विषयों से कुल 28 प्रतिभागियों ने भाग लिया और इससे लाभान्वित हुए।";
    $lang['photo-gallery3']="आईसीएमआर-एनआईआरटीएच 1 मार्च 2024 को अपना 41वां स्थापना दिवस बड़े उत्साह के साथ मनाएगा। डॉ. दीपक सक्सेना, निदेशक, आईआईपीएच गजंधीनगर इस अवसर पर मुख्य अतिथि थे और उन्होंने <b>नीति के लिए साक्ष्य: अनुसंधान संस्थानों की भूमिका</b> विषय पर स्थापना दिवस व्याख्यान दिया। पद्मश्री डॉ. यजदी इटालिया मुख्य अतिथि थे और इस अवसर पर बोलते हुए उन्होंने सिकल सेल नियंत्रण कार्यक्रम और इसकी उत्पत्ति के बारे में जानकारी दी। डॉ. अपारुप दास, निदेशक, आईसीएमआर-एनआईआरटीएच ने गणमान्य व्यक्तियों, अतिथियों का स्वागत किया और संस्थान की शोध गतिविधियों और उपलब्धियों के बारे में जानकारी दी। इस अवसर पर राष्ट्रीय खेल दिवस के प्रतिभागियों और विजेताओं को प्रमाण पत्र प्रदान किए गए। संस्थान के कर्मचारियों और छात्रों द्वारा एक सांस्कृतिक कार्यक्रम का आयोजन किया गया। डॉ. केबी साहा, वैज्ञानिक जी ने धन्यवाद ज्ञापन किया। डॉ. निशांत सक्सेना, वैज्ञानिक सी ने मंच पर सभी कार्यक्रमों का समन्वय किया।";    
    $lang['photo-gallery4']="राष्ट्रीय विज्ञान दिवस 28 फरवरी 2024 को मनाया गया। इस अवसर पर बोलते हुए आईसीएमआर-एनआईआरटीएच के निदेशक डॉ. अपारुप दास ने जीवन की गुणवत्ता में सुधार के लिए तकनीकी प्रगति की भूमिका पर प्रकाश डाला। डॉ. रुचि जैन डे, सहायक प्रोफेसर और रामलिंगस्वामी फेलो, बिट्स पिलानी, हैदराबाद ने दवा डिजाइन और निदान के लिए स्वदेशी तकनीक पर आमंत्रित व्याख्यान दिया। श्री राम इंस्टीट्यूट ऑफ टेक्नोलॉजी, जबलपुर के बी. फार्मा के छात्रों ने इस अवसर पर संस्थान का दौरा किया और वैज्ञानिकों से बातचीत की। डॉ. तपस चकमा, वैज्ञानिक जी ने धन्यवाद ज्ञापन दिया।";
    $lang['photo-gallery5']="आईसीएमआर-एनआईआरटीएच में 11 मार्च 2024 को अंतर्राष्ट्रीय महिला दिवस मनाया गया। प्रो. (डॉ.) कविता सचदेवा, हेड ईएनटी, एनएससीबी मेडिकल कॉलेज, जबलपुर मुख्य अतिथि थीं और उन्होंने अपने संघर्षों और सफलता की शपथ को साझा किया। इस अवसर पर बोलते हुए डॉ. अपारुप दास, निदेशक और डॉ. के.बी. साहा, वैज्ञानिक जी ने अपने विचार व्यक्त किए और संस्थान की महिला कर्मचारियों और छात्राओं को सम्मानित भी किया।";
    $lang['photo-gallery6']="आईसीएमआर-एनआईआरटीएच, जबलपुर ने 22 और 23 फरवरी 2023 को आईसीएमआर-एनआईआरईएच, भोपाल में <b>भारत में सिकल सेल रोग</b> पर संगोष्ठी का आयोजन किया";
    $lang['photo-gallery7']="इस दो दिवसीय संगोष्ठी के दौरान देश भर के विभिन्न (क्लीनिकल और बायोमेडिकल) क्षेत्रों के विशेषज्ञों ने एस.सी.डी. के विभिन्न पहलुओं पर चर्चा की। कार्यक्रम का समापन डॉ. एस. राजसुब्रमण्यम, वैज्ञानिक ‘ई’, आई.सी.एम.आर.-एन.आई.आर.टी.एच., जबलपुर द्वारा धन्यवाद ज्ञापन के साथ हुआ। डॉ. रवींद्र कुमार, वैज्ञानिक ‘सी’, आई.सी.एम.आर.-एन.आई.आर.टी.एच. जबलपुर ने इस दो दिवसीय संगोष्ठी में सभी गतिविधियों का समन्वय किया।";
    $lang['photo-gallery8']="16 जनवरी, 2025 को, ICMR-NIRTH ने सिकल सेल रोग प्रबंधन पर एक व्यापक प्रशिक्षण कार्यक्रम आयोजित किया, जिसमें ज्ञान और सर्वोत्तम प्रथाओं को साझा करने के लिए विशेषज्ञों और स्वास्थ्य पेशेवरों को बुलाया गया। प्रशिक्षण कार्यक्रम का उद्देश्य स्वास्थ्य पेशेवरों को रोगी के परिणामों को बेहतर बनाने और राज्य हीमोग्लोबिनोपैथी कार्यक्रम के मिशन को आगे बढ़ाने के लिए आवश्यक ज्ञान और कौशल से लैस करना था। डॉ तपस चकमा, वैज्ञानिक जी ने गणमान्य व्यक्तियों और प्रतिभागियों का स्वागत किया। डॉ दीप्ति जैन, पूर्व प्रोफेसर, जीएमसी, नागपुर ने मुख्य अतिथि के रूप में कार्य किया और डॉ रूबी खान, उप निदेशक, एनएचएम भोपाल ने सम्मानित अतिथि के रूप में कार्य किया। डॉ श्वेता पाठक और डॉ विद्या के.एस, बाल रोग विभाग, डॉ के.के. पांडे, हड्डी रोग विभाग और डॉ नम्रता खंडेलवाल, न्यूरोलॉजी विभाग, एनएससीबी मेडिकल कॉलेज, जबलपुर इस प्रशिक्षण कार्यक्रम में अन्य संकाय सदस्य थे";
   
   //what is new
    $lang['whats_new']="नया क्या है";
   $lang['Admissions-Opens']=" पीएचडी कार्यक्रम के लिए प्रवेश प्रारंभ";
   
    //Circulars
    $lang['Vigilance-Officer-Notification']="Notice Regarding Change of Vigilance Officer";
    $lang['Cashless-Medical-Facility']="आईसीएमआर केंद्र में कार्यरत गैर सीजीएचएस कर्मचारियों के लिए कैशलेस चिकित्सा सुविधा योजना।";
     $lang['Hindi-Pakhwada']="हिंदी पखवाड़ा 2022 के अंतर्गत हिंदी प्रतियोगिताओं का आयोजन किया जा रहा है।";
     $lang['Air-Tickets']="सरकारी खाते पर हवाई टिकटों की बुकिंग के संबंध में अनुदेशों में संशोधन।शों में संशोधन.";
     $lang['Promotion']="कार्यालय के दैनिक कार्यों में हिन्दी को बढ़ावा देना।";
     $lang['nodal-officer']="नोडल अधिकारी- कोविड-19";
     $lang['ICMR-Policy']="अनुसंधान अखंडता और प्रकाशन नैतिकता पर आईसीएमआर नीति	";
     $lang['Voluntary-donation']="स्वैच्छिक दान";
     $lang['Circular-Publication']="परिपत्र प्रकाशन स्क्रीनिंग समिति";
     $lang['Format-Publication']="प्रारूप प्रकाशन स्क्रीनिंग समिति	";
     $lang['IT-Circular']="आईटी परिपत्र 2023-24";
     $lang['Hindi-Fortnight23']="हिंदी पखवाड़ा प्रतियोगिताएं महत्वपूर्ण जानकारी 18-09-2023";
     $lang['Incentive-scheme']="सरकारी कामकाज में मूलतः हिंदी में टिप्पण/प्रारूपण करने के लिए प्रोत्साहन योजना।";
     $lang['Hindi-Fortnight24']="हिंदी पखवाड़ा-2024 - महत्वपूर्ण जानकारी";
  //press
    $lang['news']="प्रेस विज्ञप्ति";
    $lang['news_1']="18 जनवरी, 2025 को, राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान (ICMR-NIRTH), जबलपुर के तत्वावधान में, सामुदायिक स्वास्थ्य केंद्र, बजाग, जिला डिंडोरी में जनजातीय पारंपरिक चिकित्सा को सार्वजनिक स्वास्थ्य प्रणाली के साथ एकीकृत करने पर एक कार्यक्रम आयोजित किया गया। इस कार्यक्रम में डॉ. आर.आर. तिवारी, निदेशक, ICMR-NIRTH, डॉ. के.बी. साहा, वैज्ञानिक जी, और डॉ. निशांत सक्सेना, वैज्ञानिक सी के नेतृत्व में चर्चाएँ हुईं। उन्होंने आदिवासी पारंपरिक प्रथाओं और आधुनिक स्वास्थ्य सेवा प्रणालियों के बीच तालमेल स्थापित करने के लिए पंडा/गुनिया/वैद्य चिकित्सकों सहित पारंपरिक चिकित्सकों से संपर्क किया। पारंपरिक चिकित्सकों को अपने अभ्यास के साथ-साथ आधुनिक चिकित्सा उपचार के लिए रोगियों को निकटतम स्वास्थ्य सेवा केंद्रों में भेजने के लिए प्रोत्साहित किया गया।";
    $lang['news_2']="<p><b>एलीफेंटियासिस फैलाने वाले मच्छरों की प्रजातियों का पता लगाया जाएगा</b><BR>
 आईसीएमआर की शोध टीम ने इंदरगढ़ और शहर के प्रभावित इलाकों से नमूने एकत्र किए।";
    $lang['news_3']="<p><b>बायोस्टैटिस्टिक्स में नवाचारों और व्यावहारिक चुनौतियों पर चर्चा की गई</b> <br>आईसीएमआर-राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच) ने चिकित्सा विज्ञान में बायोस्टैटिस्टिक्स के अनुप्रयोग पर तीन दिवसीय कार्यशाला का उद्घाटन किया, जो 12.06.2024 से शुरू होगी।</p>";
   $lang['news_4']="<p><b>सांख्यिकीय आंकड़ों का विश्लेषण करके महामारी के विज्ञान को समझ सकेंगे</b><br>
   कार्यशाला का उद्देश्य जैव सांख्यिकी में नवाचारों और व्यावहारिक चुनौतियों पर अंतःविषय चर्चा को बढ़ावा देना है।<br>";
   $lang['news_5']="आईसीएमआर-एनआईआरटीएच जबलपुर की टीम ने निदेशक डॉ. अपरूप दास और वैज्ञानिक एफ एवं एनसीओ डॉ. केबी साहा के नेतृत्व में हाल ही में राजस्थान के बारां जिले का दौरा किया, जहां उन्होंने सहरिया जनजाति (पीवीटीजी) में तपेदिक के खतरे के बारे में जानकारी ली। इस दौरे को स्थानीय प्रिंट मीडिया में व्यापक रूप से कवर किया गया।";
   $lang['news_6']="ग्वालियर के स्थानीय हिंदी समाचार पत्र पीपुल्स डेली में प्रकाशित कोविड-19 समाचार पर अंतर्राष्ट्रीय वेबिनार।";
   $lang['news_7']="ग्वालियर में ICMR-NIRTH द्वारा कोरोना वायरस सामुदायिक सर्वेक्षण की खबर ग्वालियर के स्थानीय हिंदी समाचार पत्र दैनिक भास्कर और नई दुनिया दैनिक में 16.05.20 को प्रकाशित हुई।";
   $lang['news_8']="स्थानीय हिंदी समाचार पत्र प्रदेश टुडे में 29 मार्च को प्रकाशित कोरोना वायरस पर निदेशक डॉ. अपरूप दास की मीडिया कवरेज।";
   $lang['news_9']="आईसीएमआर-एनआईआरटीएच प्रयोगशाला में कोरोना वायरस परीक्षण संबंधी समाचार स्थानीय हिंदी समाचार पत्र पत्रिका में 19.03.20 को प्रकाशित हुआ";
   $lang['news_10']="4 मार्च 2020 को 37वां स्थापना दिवस उत्साह के साथ मनाया गया और स्थानीय दैनिक समाचार पत्रों जैसे पत्रिका, दैनिक भास्कर और हितवाद ने समाचार प्रकाशित किए। आईसीएमआर के अतिरिक्त महानिदेशक डॉ जी एस टोटेजा मुख्य अतिथि थे और आईसीएमआर-बीएमएचआरसी, भोपाल की निदेशक डॉ प्रभा देसिकन विशिष्ट अतिथि थीं।";
   $lang['news_11']="17-18 दिसंबर 2019 को आईसीएमआर-निर्थ, जबलपुर में क्षय रोग पर एक संगोष्ठी और कार्यशाला आयोजित की गई और स्थानीय दैनिक समाचार पत्रों जैसे पत्रिका, नवभारत, हितवाद और दैनिक भास्कर ने 18 दिसंबर 2019 को समाचार प्रकाशित किए। मध्य प्रदेश आयुर्विज्ञान विश्वविद्यालय के कुलपति प्रो.आरएस शर्मा मुख्य अतिथि थे और एनएससीबी मेडिकल कॉलेज, जबलपुर के डीन डॉ.पीके कसार विशिष्ट अतिथि थे। देश के विभिन्न संस्थानों के प्रतिष्ठित वैज्ञानिकों ने भाग लिया और क्षय रोग से निपटने की रणनीतियों, चुनौतियों के बारे में चर्चा की।";
   $lang['news_12']="जनजातियों में स्वास्थ्य समस्याओं पर अनुसंधान के लिए अकादमिक आदान-प्रदान हेतु 5 अक्टूबर 2019 को जीवाजी विश्वविद्यालय (जेयू), आईसीएमआर-राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान और आईटीएम विश्वविद्यालय के बीच समझौता ज्ञापन (एमओयू) पर हस्ताक्षर किए गए, जिसके बारे में पत्रिका और दैनिक भास्कर दैनिक समाचार पत्रों में जानकारी प्रकाशित की गई।";
   $lang['news_13']="19.08.2019 को अंतर्राष्ट्रीय स्वदेशी जनसंख्या दिवस समारोह का कवरेज दैनिक समाचार पत्र नई दुनिया में";
   $lang['news_14']="मेडिकल यूनिवर्सिटी ने पीएचडी के लिए आईसीएमआर-एनआईआरटीएच को मान्यता दी- दैनिक भास्कर दैनिक समाचार पत्र में 24.03.2019 को समाचार कवरेज";
   $lang['news_15']="आईसीएमआर-एनआईआरटीएच में आदिवासी स्वास्थ्य मेला - दैनिक भास्कर दैनिक समाचार पत्र में 27.02.2019 को समाचार कवरेज";
   $lang['news_16']="रानी दुर्गावती अस्पताल में थैलेसीमिया कार्यशाला- दैनिक भास्कर पत्रिका दैनिक समाचार पत्र में 10.05.2018 को समाचार कवरेज";                   
   $lang['news_17']="02.03.2018 को पत्रिका एवं हितवाद दैनिक समाचार पत्र में 35वें स्थापना दिवस कार्यक्रम का कवरेज";
   $lang['news_18']="डॉ. श्री एवं श्रीमती आमटे के 17.08.2017 को आईसीएमआर-एनआईआरटीएच दौरे की खबर पत्रिका समाचार पत्र में प्रकाशित हुई।";
   $lang['news_19']="राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान, जबलपुर द्वारा पारंपरिक चिकित्सा पद्धति और आधुनिक स्वास्थ्य सेवाओं के समन्वय पर आधारित एक कार्यक्रम का आयोजन किया गया। स्थानीय वैद्यों और पंडाओं के साथ चर्चा कर जनजातीय स्वास्थ्य सेवाओं को बेहतर बनाने पर जोर दिया गया। प्रतिभागियों को प्रमाणपत्र और किट प्रदान किए गए";
   $lang['news_20']="सिकलसेल बीमारी पर एक परिचर्चा का आयोजन किया गया, जो डॉ. पी.एन.के. शर्मा और एनआईआरटीएच जबलपुर के निर्देशन में हुई। विशेषज्ञों ने इस आनुवांशिक बीमारी से प्रभावित जनजातीय समुदायों में इसके प्रारंभिक निदान, प्रभावी उपचार और जागरूकता बढ़ाने के महत्व पर प्रकाश डाला।";
  
  //footer
     $lang['organization']="एकत्रीकरण और शासी संगठन";
     $lang['Research']="अनुसंधान एवं प्रकाशन";
     $lang['Ongoing']="चल रही अनुसंधान परियोजनाएं";
     $lang['Scientist']="वैज्ञानिक";
     $lang['student_staff']="छात्र एवं कर्मचारी";
  
}
?>