<?php

//$set_language=$_GET['language'];
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

if($_SESSION['language']=='hi'){
    $language='hi';
} else {
    $language='en';
}

if($language=='en'){
    $lang['home']="Home";
    $lang['about_us']="About Us";
    $lang['icmr']="ICMR-National Institute of Research In Tribal Health";
    $lang['who_we_are']="Who we are and <strong class=\"cs-color\">what we do?</strong>";
    $lang['about_para1']="The ICMR-National Institute of Research in Tribal Health (NIRH), formerly known as the Regional Medical Research
    Centre for Tribals (RMRCT) saw the light of the day in three rooms at the adjoining Netaji Subhash Chandra Bose
    Medical College, Jabalpur in 1984. The RMRCT was shifted to the main building spanning a 36 acre lush-green
    campus in April 2002 and re-designated to its present name (NIRH) in 2014. ICMR-NIRH since then has grown to
    accommodate established laboratories on viral diagnosis, molecular genetics, molecular parasitology, genomic
    epidemiology, microbiology, clinical epidemiology, and in vitro research facilities associated with a modern central
    animal facility.";
    $lang['about_para2']="ICMR-NIRH conducts research on health issues of the tribal populations of the country, including nutritional
    disorders, common communicable and non-communicable diseases, environmental health problems, etc. Scientists
    of ICMR-NIRH regularly help the state health departments in diagnosis, planning, monitoring and evaluation of
    tribal health and other health developmental programs in tribal areas of Madhya Pradesh and Chhattisgarh and also
    in training health functionaries of these states. ICMR-NIRH works on diseases that are mostly prevalent in tribes,
    such as malaria, tuberculosis, haemoglobinopathies, hypertension, filariasis, fluorosis, dengue, chikungunya, and
    zoonotic diseases that are of importance to tribal populations. ICMR-NIRH also takes up disease outbreak
    surveillance and research in tribal regions and help the state government to control such situations. Apart from
    biomedical research, scientists of ICMR-NIRH regularly provide trainings to state heal professionals on modern
    techniques for diagnosis and diseases interventions. In addition, research on socio-economic, demographic and
    cultural aspects of the tribal population also have enabled in defining measures for disease prevention and control.
    <br><br>
    Apart from its presence in Jabalpur, ICMR-NIRH also has a field unit at Keylong, Lahaul and Spiti district of Himachal
    Pradesh, located at 10,100 feet above mean sea level (MSL) to conduct biomedical and social science research on
    health issues of the Himalayan tribes.";
    $lang['about_mandate']="Mandate of ICMR-NIRH";
    $lang['mandate_content']="<ul>
    <li>To plan, conduct and coordinate research in order to bring out the specific health problems and health needs of the tribal of the country.</li>
    <li>To conduct epidemiological studies of communicable and non-communicable diseases among the tribal.</li>
    <li>To investigate haemoglobinopathies in tribal and other communities.</li>
    <li>To advise and assist the Government in planning, executing, monitoring and evaluation of tribal health programs and in training of health functionaries.</li>
    </ul>
                                            <p>The ultimate goal of ICMR-NIRH is to improve health, nutrition and health awareness among the aboriginals
    through basic, applied and operational research to a level that they are no longer considered under-privileged in
    term of health research in the country.</p>";
    $lang['director_profile']="<strong>The National Institute of Research in Tribal Health (NIRH), Jabalpur is one of the 30 health
    research institutes working under the aegis of the Indian Council of Medical Research (ICMR),
    Department of Health Research, Ministry of Health and Family Welfare, Government of India.
    Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of
    India, ICMR-NIRH is surrounded by thickly-forested tribal dominated areas, and is the only
    publicly funded organization dedicated to research on health of tribes of the country. Considering
    health of aboriginals is of prime national importance, biomedical scientists of ICMR-NIRH with
    diverse training and expertise, supported by 100-plus technical staff and several scientific staff of
    different time-bound research projects are putting tireless endeavor in collaboration with state
    government health officials, to not only diagnose and intervene different diseases prevalent in
    tribes, but also perform high-end biomedical research using modern tools to understand the
    mechanism of diseases and utilize the knowhow to devise novel methods of intervention and
    control. Apart from this, social scientists of ICMR-NIRH are regularly involved in interacting with
    different tribal communities to campaign on the disease preventive measures, by which health
    issues can be mitigated before they emerge in a large way in communities.</strong><br><br>
                                 <p>In order to smoothen research activities, scientists and technical personnel of ICMR-NIRH form
    small groups based on their training and expertise into six different divisions; viz., Communicable
    Diseases, Genetic Disorders, Non-communicable Diseases, Social Science and Ethno-medicine,
    Vector Borne Diseases, and Viral and Zoonotic Diseases. Not only ICMR-NIRH provides free-of-
    cost laboratory-based diagnostic facilities using highly-sensitive methods to several diseases
    endemic to this region to tribal and non-tribal populations alike, regular counselling to patients
    and their relatives on personal protection, prevention and control of diseases is also provided.
    Apart from this, teams of scientists and technical staff of ICMR-NIRH regularly make field-trips in
    hard-to-reach tribal areas to survey on the prevalence of different diseases in communities and
    where needed, help patients to undergo treatment at the local healthcare facilities. They also
    simultaneously collect biological samples, which constitute the raw material for research to find
    solutions and control by which health of tribes can be better managed.</p>
                                <p>Due to highly committed research in the area of tribal health, ICMR-NIRH has been conferred
    with the prestigious ‘collaborating center for research on health of the aboriginal populations’ by
    the World Health Organization (WHO), Geneva. Furthermore, ICMR-NIRH acts as the coordinating
    institute of the ‘Tribal Health Research Forum’ formed by ICMR, and is responsible to synchronize
    research on tribal health among other participating ICMR institutes working on heath of local
    tribes in India. Over the last 32 years of its existence, ICMR-NIRH has significantly contributed to
    health research output of the country, especially on tribal health through dissemination of
    research in the form of publications, monographs and changing/formulating health policies based
    on research evidences. This is possible because of the geographical location of ICMR-NIRH and
    tremendous facilities for biomedical and social scientific research created by the ICMR leadership,
    which is continuing till date. This might be the reason scientists of national and international
    repute are attracted to join hands and share expertise with scientists of ICMR-NIRH, thereby
    building a strong network of collaborative research, evaluation of diagnosis and trial of vaccines
    etc. related to several diseases largely prevalent in tribes. </p>
                                <p>Effective integration and committed contribution of enthusiastic young professionals are keys to
    growth of every organization, especially scientific research institutes like ICMR-NIRH.
    Hardworking and committed young medical, biological, social and natural scientists determined to
    make an impact to tribal health research are welcome to join hands with scientists of ICMR-NIRH
    on their consistent effort to alleviate health issues of aboriginals, and contribute to the “Make-in-
    India for Healthy India” campaign of the honorable Prime Minister of India.</p><br><br>
                               <h5 class=\"text-right\">Dr. Aparup Das<br>
    <small>Director, ICMR-NIRH</small></h5>";
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

    $lang['from_the_director_desk']="From the Director’s Desk";

    $lang['abdul_kalam_quote']="<p>Ultimately, education in its real sense is the pursuit of truth. It is an endless journey through knowledge and enlightenment.</p>
    <span>A. P. J. Abdul Kalam</span>";
    
    //former directors 
    $lang['leadership_title']="Leadership of ICMR-NIRH, Jabalpur";
    $lang['s_d_verma']="Dr. S.D. Verma";
    $lang['y_n_mathur']="Dr. Y.N. Mathur";
    $lang['b_n_saxena']="Dr. B.N. Saxena";
    $lang['r_s_tiwary']="Dr. R.S. Tiwary";
    $lang['neeru_singh']="Dr. Neeru Singh";
    $lang['a_p_das']="Dr. A.P. Dash";
    $lang['m_a_ansari']="Dr. M.A. Ansari";
    $lang['aprup_das']="Dr. Aparup Das";
    $lang['project_director']="Project Director";
    $lang['officer_in_charge']="Officer-in-charge";
    $lang['director_additional_charge']="Director (Addl. Charge)";
    $lang['director']="Director";
    $lang['oic_director']="OIC/Director";

    //menu items
    $lang['career_opportunity']="Career Opportunity";
    $lang['tenders']="Tenders";
    $lang['employees_corner']="Employee's Corner";
    $lang['rti']="RTI";
    $lang['contact_us']="Contact Us";
    $lang['about']="About";
    $lang['profile']="Profile";
    $lang['directors_desk']="Director's Desk";
    $lang['leadership_nirth']="Leadership of ICMR-NIRH";
    $lang['staff_list']="Staff List";
    $lang['research']="Research";
    $lang['scientist']="Scientist";
    $lang['publication']="Publication";
    $lang['media']="Media";
    $lang['press_release']="Press Release";
    $lang['photo_gallery']="Photo Gallery";
    $lang['video_gallery']="Video Gallery";
    $lang['nirth_news']="NIRH in News";
    $lang['latest_research']="Latest Research";
    $lang['profiles']="Profiles";
    $lang['institutional_publications']="Institutional Publications";
    $lang['old_website']="Old Website";
    $lang['about_nirth']="About NIRH";
    $lang['useful_links']="Useful Links";
    $lang['newsletter']="NewsLetter";
    $lang['address']="NIRH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA";
    $lang['nirth']="NIRH";
    $lang['main_campus']="MAIN CAMPUS";
    $lang['old_name']="Formerly: Regional Medical Research Centre for Tribals (RMRCT)";
    $lang['indian_council_of_medical_research']="Indian Council of Medical Research";
    $lang['department_of_health_research']="Department of Health Research";
    $lang['ministry_of_health_family_welfare']="Ministry of Health & Family Welfare";
    $lang['ministry_of_tribal_affairs']="Ministry of Tribal Affairs";

    //home page
    $lang['vacancies']="Vacancies";
    $lang['whatsnew']="What's New";
    $lang['research_division']="Research Division";
    $lang['nirth_profile']="NIRH Profile";
    $lang['admit_card']="Admit Card";
    $lang['result']="Result";
    $lang['downloads']="Downloads";
    $lang['sophisticated_analytical_instrument_facility']="Sophisticated Analytical Instrument Facility";
    $lang['student_corner']="Student Corner";
    $lang['adjunct_faculty_scheme_icmr']="Adjunct Faculty Scheme of ICMR";
    $lang['diagnosis_novel_coronavirus']="Diagnosis Novel Coronavirus";
    $lang['readmore']="Read More";
    $lang['view_profile']="View Profile";
    $lang['view_All']="View All";
    $lang['corona_activities']="Corona Activities by ICMR-NIRH";

    $lang['director_profile_short']="The National Institute of Research in Tribal Health (NIRH), Jabalpur is one of the 30 health research institutes working under the aegis of the Indian Council of Medical Research (ICMR), Department of Health Research, Ministry of Health and Family Welfare, Government of India. Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of India, ICMR-NIRH is surrounded by thickly-forested tribal dominated areas,";

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
    $lang['administration']="Administration";
    $lang['vehicle_section']="Vehicle Section";
    $lang['division']="Division";
    $lang['scientific_divisions']="Scientific Divisions";

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
}
elseif($language=='hi'){
    $lang['home']="होम";
    $lang['about_us']="हमारे बारे में";
    $lang['icmr']="आईसीएमआर-राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान";
    $lang['who_we_are']="हम कौन हैं और <strong class=\"cs-color\">हम क्या करते हैं?</strong>";
    $lang['about_para1']="आईसीएमआर-राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जिसे पूर्व में क्षेत्रीय जनजाति आयुर्विज्ञान अनुसंधान केन्द्र (आरएमआरसीटी) के नाम से जाना जाता था, ने वर्ष 1984 में अपनी शुरूआत इसके समीप नेताजी सुभाष चंद्र बोस चिकित्सा महाविद्यालय, जबलपुर के तीन कमरों से की थी। बाद में आरएमआरसीटी को 36 एकड़ के हरे-भरे परिसर में निर्मित मुख्य भवन में अप्रैल 2002 में स्थानांतरित किया गया और इसे इसके वर्तमान नाम एनआईआरटीएच के तौर पर वर्ष 2014 में पुनःनामित किया गया। आईसीएमआर-एनआईआरटीएच ने तब से वायरल डायग्नोसिस, मौलेक्यूलर जेनेटिक्स, मौलेक्यूलर पैरासाइटोलॉजी, जेनोमिक एपिडेमायोलॉजी, माइक्रोबायोलॉजी, क्लिनिकल एपिडेमायोलॉजी, और एक आधुनिक केन्द्रीय पशु सुविधा से जुड़े इन विट्रो अनुसंधान सुविधाओं पर प्रयोगशालाओं को स्थापित करने में प्रगति की है।
    ";
    $lang['about_para2']="आईसीएमआर-एनआईआरटीएच देश की जनजातीय आबादी के स्वास्थ्य मुद्दों पर अनुसंधान आयोजित करता है, जिसमें पोषण संबंधी विकार, सामान्य संक्रामक और गैर-संक्रामक रोग, पर्यावरणीय स्वास्थ्य समस्याएं आदि शामिल हैं। आईसीएमआर-एनआईआरटीएच के वैज्ञानिक नियमित रूप से मध्य प्रदेश और छत्तीसगढ़ के आदिवासी क्षेत्रों में आदिवासी स्वास्थ्य और अन्य स्वास्थ्य विकास कार्यक्रमों के निदान, नियोजन, निगरानी और मूल्यांकन में राज्य के स्वास्थ्य विभागों की सहायता करते हैं और इन राज्यों के स्वास्थ्य अधिकारियों को प्रशिक्षण देते हैं। आईसीएमआर-एनआईआरटीएच उन रोगों पर कार्य करता है जो ज्यादातर आदिवासी क्षेत्रों में फैलते हैं, जैसे कि मलेरिया, यक्ष्मा (ट्यूबरकुलोसिस), हीमोग्लोबिनोपैथी, उच्च रक्तचाप, फाइलेरिया, फ्लोरोसिस, डेंगू, चिकनगुनिया और जूनोटिक रोग जो जनजातीय आबादी के लिए महत्वपूर्ण हैं। आईसीएमआर-एनआईआरटीएच जनजातीय क्षेत्रों में बीमारी के प्रकोप की निगरानी और अनुसंधान भी करता है, और राज्य सरकार को ऐसी स्थितियों को नियंत्रित करने में मदद करता है। जैव चिकित्सा अनुसंधान के अलावा, आईसीएमआर-एनआईआरटीएच के वैज्ञानिक नियमित रूप से निदान और बीमारियों की रोकथाम के लिए आधुनिक तकनीकों पर राज्य के स्वास्थ्य पेशेवरों को प्रशिक्षण प्रदान करते हैं। इसके अलावा, जनजातीय आबादी के सामाजिक-आर्थिक, जनसांख्यिकीय और सांस्कृतिक पहलुओं पर शोध ने रोगों की रोकथाम और नियंत्रण के उपायों को परिभाषित करने में भी सक्षम बनाया है।
<br><br>
    जबलपुर में अपनी उपस्थिति के अलावा आईसीएमआर-एनआईआरटीएच की हिमाचल प्रदेश के केलोंग, जिला- लाहौल एवं स्‍पीति में भी एक स्थानीय इकाई है, जो औसत समुद्र तल (एमएसएल) से 10,100 फुट की ऊंचाई पर अवस्थित है जिससे कि हिमालयी जनजातीय समुदायों के स्वास्थ्य से जुड़े मुद्दों पर जैवचिकित्सीय तथा सामाजिक विज्ञान अनुसंधानों का आयोजन किया जा सके।
    ";
    $lang['about_mandate']="आईसीएमआर-एनआईआरटीएच का जनादेश";
    $lang['mandate_content']="<ul>
    <li>देश के जनजातीय समुदायों की विशिष्ट स्वास्थ्य समस्याओं और स्वास्थ्य आवश्यकताओं को सामने लाने के लिए अनुसंधान की योजना बनाना, संचालन और समन्वय करना।</li>
<li>जनजातीय समुदायों के बीच संक्रामक एवं गैर-संक्रामक रोगों के ऐपीडेमियोलॉजीकल (महामारी विज्ञान) अध्ययनों का संचालन करना।</li>
<li>आदिवासी और अन्य समुदायों में हीमोग्‍लोबिनोपैथीज की जांच करना। </li>
<li>जनजातीय स्वास्थ्य कार्यक्रमों के नियोजन, क्रियान्वयन, निगरानी और मूल्यांकन में स्वास्थ्य कर्मचारियों को प्रशिक्षण देने में सरकार की सलाह और सहायता करना।</li>
</ul>
<p>आईसीएमआर-एनआईआरटीएच का अंतिम लक्ष्य बुनियादी, व्यावहारिक और परिचालनगत अनुसंधान के माध्यम से जनजातियों के बीच स्वास्थ्य, पोषण और स्वास्थ्य जागरूकता में सुधार करना है क्योंकि उन्हें अब देश में स्वास्थ्य अनुसंधान के तहत विशेषाधिकार प्राप्त नहीं माना जाता है। </p>
";
$lang['director_profile']="<p><strong>राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जबलपुर भारतीय आयुर्विज्ञान अनुसंधान परिषद (आईसीएमआर), स्वास्थ्य अनुसंधान विभाग, स्वास्थ्य और परिवार कल्याण मंत्रालय, भारत सरकार के तत्वावधान में कार्यरत देश के 30 स्वास्थ्य अनुसंधान संस्थानों में से एक है। भारत के हृदय प्रदेश कहे जाने वाले मध्य प्रदेश राज्य के हरे-भरे 44 एकड़ के परिसर में फैला आईसीएमआर-एनआईआरटीएच, घने जंगलों से घिरा हुआ आदिवासी बहुल इलाका है, और यह एकमात्र सार्वजनिक रूप से वित्त पोषित संगठन है, जो देश की जनजातियों के स्वास्थ्य पर शोध के लिए समर्पित है। जनजातीय समुदायों के स्वास्थ्य पर ध्यान देना प्रमुख राष्ट्रीय महत्व है, विभिन्न प्रशिक्षण और विशेषज्ञता के साथ आईसीएमआर-एनआईआरटीएच के बायोमेडिकल वैज्ञानिक, जो 100 से अधिक तकनीकी कर्मचारियों और विभिन्न समयबद्ध अनुसंधान परियोजनाओं के कई वैज्ञानिक कर्मचारियों द्वारा समर्थित हैं, राज्य सरकार के स्वास्थ्य अधिकारियों के साथ सहयोग में अथक प्रयास कर रहे हैं, न केवल इन जनजातियों में प्रचलित विभिन्न रोगों का निदान और हस्तक्षेप करने के लिए, बल्कि आधुनिक औजारों का उपयोग करते हुए और उच्च तकनीक की बायोमेडिकल रिसर्च करने हेतु रोगों के तंत्र को समझने के लिए, ताकि इनकी रोकथाम और नियंत्रण के वास्तविक तरीकों को विकसित किया जा सके। इसके अलावा, आईसीएमआर-एनआईआरटीएच के सामाजिक वैज्ञानिक नियमित रूप से विभिन्न जनजातीय समुदायों के साथ रोग निवारक उपायों पर अभियान चलाने के लिए परस्पर कार्य कर रहे हैं, जिससे समुदायों में बड़े पैमाने पर इनके प्रसार से पहले ही स्वास्थ्य संबंधी मुद्दों को कम किया जा सके।</strong>
<br><br><br>
अनुसंधान गतिविधियों को सुचारू बनाने के लिए, आईसीएमआर-एनआईआरटीएच के वैज्ञानिक और तकनीकी कर्मी अपने प्रशिक्षण और विशेषज्ञता के आधार पर विभिन्न प्रभागों के छह अलग-अलग छोटे समूह बनाते हैं; जैसे कि संक्रामक रोग, आनुवांशिक विकार, गैर-संक्रामक रोग, सामाजिक विज्ञान और नृजाति चिकित्साविज्ञान, वेक्टर जनित रोग और वायरल तथा जूनोटिक रोग। आईसीएमआर-एनआईआरटीएच न केवल इस क्षेत्र के जनजाति और गैर-जनजाति आबादी हेतु कई बीमारियों के लिए अत्यधिक संवेदनशील तरीकों का उपयोग करते हुए, निःशुल्क प्रयोगशाला आधारित नैदानिक सुविधाएं प्रदान करता है; बल्कि व्यक्तिगत सुरक्षा, रोकथाम और रोगों पर नियंत्रण के लिए रोगियों और उनके रिश्तेदारों को नियमित परामर्श भी प्रदान किया जाता है। इसके अलावा, आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों और तकनीकी कर्मचारियों की टीम नियमित रूप से दुर्गम जनजातीय क्षेत्रों में स्थल दौरे करती हैं, ताकि समुदायों में विभिन्न बीमारियों के फैलने पर सर्वेक्षण किया जा सके, और जहां कहीं भी जरूरत पड़े मरीजों का इलाज करने में स्थानीय स्वास्थ्य सुविधाओं से उन्हें मदद मिल सके। वे एक साथ जैविक नमूने भी एकत्र करते हैं, जो समाधान और नियंत्रण खोजने के लिए अनुसंधान के लिए कच्चे संसाधन का गठन करते हैं, जिससे जनजातियों के स्वास्थ्य का बेहतर प्रबंधन किया जा सकता है।
<br><br><br>
जनजातीय स्वास्थ्य के क्षेत्र में अत्यधिक प्रतिबद्ध अनुसंधान के लिए आईसीएमआर-एनआईआरटीएच को विश्व स्वास्थ्य संगठन (डब्ल्यूएचओ), जिनेवा द्वारा प्रतिष्ठित ‘‘जनजातीय आबादी के स्वास्थ्य पर शोध हेतु सहयोग केन्द्र’’ के रूप में सम्मानित किया गया है। इसके अलावा, आईसीएमआर-एनआईआरटीएच ‘‘ट्राइबल हेल्थ रिसर्च फोरम’’ के समन्वय संस्थान के रूप में कार्य करता है, जो आईसीएमआर द्वारा गठित है और यह इस कार्य में सहभागी आईसीएमआर संस्थानों के बीच, आदिवासी स्वास्थ्य पर अनुसंधान का सामन्जस्य करने हेतु जिम्मेदार है, जो भारत में स्थानीय जनजातियों के स्वास्थ्य पर कार्य कर रहे हैं। अपनी स्थापना के इन 32 वर्षों में, आईसीएमआर-एनआईआरटीएच ने देश के स्वास्थ्य अनुसंधान उत्पादन में विशेष रूप से योगदान दिया है, विशेष तौर पर जनजातीय स्वास्थ्य पर प्रकाशनों, मोनोग्राफों के रूप में अनुसंधान के प्रसार और अनुसंधान/विकास आधारित स्वास्थ्य नीतियों के निर्माण के माध्यम से। आईसीएमआर-एनआईआरटीएच की भौगोलिक अवस्थिति और बायोमेडिकल तथा सामाजिक वैज्ञानिक अनुसंधान के लिए जबरदस्त सुविधाओं के कारण ही यह संभव हो सका है, जो कि आईसीएमआर नेतृत्व द्वारा सृजित किया गया है, और जो आज तक जारी है। यही कारण है कि राष्ट्रीय और अंतर्राष्ट्रीय ख्याति के वैज्ञानिक आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों के साथ हाथ मिलाने और विशेषज्ञता साझा करने के लिए आकर्षित हो रहे हैं, जिससे सहयोगी अनुसंधान का एक मजबूत नेटवर्क का निर्माण हो सके और साथ ही जनजातियों में काफी हद तक प्रचलित कई बीमारियों से संबंधित निदान का मूल्यांकन और टीकों आदि का परीक्षण किया जा सके।
<br><br><br>
उत्साही युवा पेशेवरों का प्रभावी एकीकरण और प्रतिबद्ध योगदान प्रत्येक संगठन की विकास की कुंजी है, विशेष रूप से आईसीएमआर-एनआईआरटीएच जैसे वैज्ञानिक अनुसंधान संस्थानों के लिए। चिकित्सा, जैविक, सामाजिक और प्राकृतिक वैज्ञानिकों के रूप में मेहनती और प्रतिबद्ध युवा जो आदिवासी स्वास्थ्य अनुसंधान के लिए एक प्रभाव बनाना चाहते हैं, ऐसे युवाओं को आईसीएमआर-एनआईआरटीएच के वैज्ञानिकों के साथ हाथ मिलाने के लिए आमंत्रित किया जाता है ताकि जनजातियों के स्वास्थ्य संबंधी समस्याओं को कम किया जा सके, और भारत के माननीय प्रधानमंत्री के ‘मेक इन इंडिया फॉर हेल्दी इंडिया’ अभियान में योगदान दिया जा सके। 
</p>
                               <h5 class=\"text-right\">डॉ. अपरूप दास <br>
    <small>निदेशक, आईसीएमआर-एनआईआरटीएच</small></h5>";
    $lang['director_academic_title']="डॉ. अपरूप दास का शैक्षणिक प्रोफाइल";
    $lang['director_academic_profile']=" डॉ. अपरूप दास प्रशिक्षित जनसंख्या आनुवंशिकीविद् और आणविक विकासवादी जीवविज्ञानी हैं। उन्होंने जीनोमिक्स और डीएनए अनुक्रम विश्लेषण पर अपने व्यापक प्रशिक्षण और अनुभव को कार्यान्वित किया है, शुरूआत में ड्रोसोफिला और बाद में मलेरिया में; साथ ही उन्होंने भारत और अफ्रीका में मलेरिया महामारी विज्ञान को समझने के लिए इन आधुनिक जैविक तकनीकों को लागू किया है। भुवनेश्वर के उत्कल विश्वविद्यालय से जूलॉजी (प्राणि विज्ञान) में स्नातक और स्नातकोत्तर उपाधि प्राप्त करने और बनारस हिंदू विश्वविद्यालय, वाराणसी से डॉक्टरेट की उपाधि प्राप्त करने के पश्चात डॉ. दास जर्मनी के म्यूनिख स्थित लुडविग मैक्सिमिलियन विश्वविद्यालय में चार वर्षीय पोस्ट-डॉक्टरेट अध्ययन के लिए गए, जहाँ उन्होंने जीनोमिक्स और जैव सूचना विज्ञान में प्रशिक्षण प्राप्त किया। वर्ष 2005 में भारत वापस आने के बाद, वे नई दिल्ली में आईसीएमआर- राष्ट्रीय मलेरिया अनुसंधान संस्थान, नई दिल्ली में वह एक वैज्ञानिक के रूप में शामिल हुए, जहाँ उन्होंने 12 वर्ष तक मलेरिया की आणविक महामारी विज्ञान का अध्ययन करके सेवा की। मई 2016 में, उन्होंने आईसीएमआर-चिकित्सा कीट विज्ञान अनुसंधान केंद्र, मदुरै, तमिलनाडु में निदेशक के रूप में कार्यभार ग्रहण किया और उसके बाद आईसीएमआर-राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान के निदेशक के रूप में यहां स्थानांतरित हुए। भारत और कैमरून (अफ्रीका) में मलेरिया की आणविक महामारी विज्ञान (मौलेक्यूलर ऐपिडेमायोलॉजी) पर उनके अनुसंधान के 14 वर्ष की अवधि में डॉ. दास और उनके अनुसंधान समूह ने मलेरिया परजीवी, दवा प्रतिरोध, मिश्रित प्रजातियों के संक्रमण, मच्छर वैक्टर की जनसंख्या की गतिशीलता, मलेरिया होने की संवेदनशीलता और मलेरिया से संबंधित फार्माकोजेनोमिक्स की कई दिलचस्प आनुवंशिक विशेषताओं को उजागर किया था।
<br><br>
    डॉ. दास को कई राष्ट्रीय और अंतर्राष्ट्रीय पुरस्कारों से सम्मानित किया गया है और ड्रोसोफिला और मलेरिया मॉडल, दोनों पर राष्ट्रीय और अंतर्राष्ट्रीय वैज्ञानिकों को सम्मिलित करने वाली कई शोध परियोजनाओं में शामिल किया गया है। उन्होंने जनसंख्या और विकासवादी आनुवंशिकी और जीनोमिक्स में 100 से अधिक प्रकाशनों का लेखन किया है, और 12 पीएचडी और 70 से अधिक स्नातकोत्तर शोध का पर्यवेक्षण व मार्गदर्शन किया है। उन्होंने वर्ष 2010 और 2017 में मलेरिया जीनोमिक्स पर दो 15-दिवसीय ग्लोबल एक्सचेंज व्याख्यान पाठ्यक्रम सहित कई राष्ट्रीय और अंतर्राष्ट्रीय कार्यशालाओं/बैठकों का आयोजन किया है, जो कि यूरोपीय आणविक जीवविज्ञान संगठन (ईएमबीओ), जर्मनी द्वारा वित्त पोषित किया गया था। वे कई उच्च प्रभाव वाली अंतर्राष्ट्रीय पत्रिकाओं के संपादक के रूप में सेवारत हैं, और लगातार कई प्रतिष्ठित राष्ट्रीय और अंतरराष्ट्रीय पत्रिकाओं की पांडुलिपियों की समीक्षा करते हैं। 
    <br><br>
    वर्तमान में डॉ. दास और उनका समूह दो अलग-अलग प्रमुख अंतरराष्ट्रीय परियोजनाओं में शामिल हैं; एक जो भारत में जटिल मलेरिया को उजागर करने के लिए नेशनल इंस्टीट्यूट ऑफ हेल्थ, यूएसए द्वारा वित्त पोषित है, और दूसरे को भारत-कनाडा सेंटर फॉर इनोवेटिव मल्टीडिसिप्लिनरी पार्टनर्स फॉर एक्सीलरेट कम्युनिटी ट्रांसफॉर्मेशन एंड सस्टेनेबिलिटी (आईसी-इम्पैक्ट्स) द्वारा वित्त पोषित किया गया है, जो मलेरिया निदान के लिए स्वास्थ्य देखभाल बिंदु को विकसित करने पर कार्य कर रहा है। डॉ. दास चिकित्सा पद्धति में पारंपरिक जनजातीय ज्ञान का लाभ उठाने और आधुनिक चिकित्सा पद्धति हेतु ज्ञान का रूपांतरण करने में रुचि रखते हैं। डॉ. दास का अंतिम उद्देश्य भारतीयों में जनसंख्या जीनोमिक जानकारी का उपयोग करना और आधुनिक निदान और उपचार के माध्यम से भारत में विकासवादी (व्यक्तिगत) दवा तैयार करना है।
    ";
    $lang['from_the_director_desk']="निदेशक की डेस्क से";

    $lang['abdul_kalam_quote']="<p>अंततः, वास्तविक अर्थों में शिक्षा सत्य की खोज है। यह ज्ञान और आत्मज्ञान से होकर गुजरने वाली एक अंतहीन यात्रा हैं।</p>
    <span>ए. पी. जे. अब्दुल कलाम</span>";
    
    // former directors
    $lang['leadership_title']="आईसीएमआर–एनआईआरटीएच, जबलपुर का नेतृत्व";
    $lang['s_d_verma']="डॉ. एस.डी. वर्मा";
    $lang['y_n_mathur']="डॉ. वाई.एन. माथुर ";
    $lang['b_n_saxena']="डॉ. बी.एन. सक्सेना";
    $lang['r_s_tiwary']="डॉ. आर.एस. तिवारी";
    $lang['neeru_singh']="डॉ. नीरू सिंह";
    $lang['a_p_das']="डॉ. ए.पी. दास";
    $lang['m_a_ansari']="डॉ. एम.ए. अंसारी";
    $lang['aprup_das']="डॉ. अपरूप दास";
    $lang['project_director']="परियोजना निदेशक";
    $lang['officer_in_charge']="प्रभारी अधिकारी";
    $lang['director_additional_charge']="निदेशक (अतिरिक्त प्रभार)";
    $lang['director']="निदेशक";
    $lang['oic_director']="ओआईसी / निदेशक";

    //menu items
    $lang['career_opportunity']="रोजगार के अवसर";
    $lang['tenders']="निविदाएं";
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
    $lang['whatsnew']="नया क्या है";
    $lang['research_division']="अनुसंधान प्रभाग";
    $lang['nirth_profile']="NIRH प्रोफाइल";
    $lang['admit_card']="प्रवेश पत्र";
    $lang['result']="परिणाम";
    $lang['downloads']="डाउनलोड";
    $lang['sophisticated_analytical_instrument_facility']="परिष्‍कृत विश्‍लेषणात्‍मक उपकरण सुविधा";
    $lang['student_corner']="स्टूडेंट कॉर्नर";
    $lang['adjunct_faculty_scheme_icmr']="भा.आ.अ.प. की अनुबद्ध प्राध्‍यापक योजना";
    $lang['readmore']="अधिक पढ़ें";
    $lang['view_profile']="प्रोफाइल देखिये";
    $lang['view_All']="सभी देखें";
    $lang['corona_activities']="Corona Activities by ICMR-NIRH";

    $lang['director_profile_short']="राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान (एनआईआरटीएच), जबलपुर भारतीय स्वास्थ्य अनुसंधान परिषद (आईसीएमआर), स्वास्थ्य अनुसंधान विभाग, स्वास्थ्य और परिवार कल्याण मंत्रालय, भारत सरकार के तत्वावधान में कार्यरत देश के 30 स्वास्थ्य अनुसंधान संस्थानों में से एक है। भारत के हृदय प्रदेश कहे जाने वाले मध्य प्रदेश राज्य के हरे-भरे 44 एकड़ के परिसर में फैला आईसीएमआर-एनआईआरटीएच, घने जंगलों से घिरा हुआ आदिवासी बहुल इलाका है, और यह एकमात्र सार्वजनिक रूप से वित्त पोषित संगठन है, जो देश की जनजातियों के स्वास्थ्य पर शोध के लिए समर्पित है।";
    $lang['research_training']="अनुसंधान और प्रशिक्षण";
    $lang['ongoing_projects']="जारी परियोजनाएं";

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
    $lang['administration']="प्रशासन";
    $lang['vehicle_section']="वाहन अनुभाग";
    $lang['division']="विभाग";
    $lang['scientific_divisions']="वैज्ञानिक प्रभाग";

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

}
?>