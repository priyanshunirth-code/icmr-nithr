<?php 
session_start();
include("language.php");
?>
<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Research & Training</title>
    
    <?php include("GlobalCss.php"); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>

</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<!-- Header Start -->
	<?php include("header.php");?>	
    <!-- Sub Header Start -->  
    <div class="page-section" style="background:url('assets/images/sub-header-research-img.jpg'); background-size:cover;padding:247px 0 5px;">
        
    </div>
    <!-- Sub Header End -->
	 
    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php"><?php echo $lang['home']; ?></a></li>
						<li><?php echo $lang['research_training']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Main Start -->
	<div class="main-section"> 
		<div class="page-section">
          <div class="container">
            <div class="row">
              
              <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="cs-section-title text-center">
                        	<h4><?php echo $lang['research_training']; ?></h4>
                            <hr>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="element-heading left">
                                        <h3><?php echo $lang['ongoing_projects']; ?></h3>
                                    </div>
                                    <div class="cs-tabs vertical">
                                      <!-- Nav tabs -->
                                      
                                      
                                      <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="liststyleNone">
                                           <button class="nav-link active"   data-bs-toggle="pill" data-bs-target="#VECTORBORNEDISEASES" type="button" role="tab" aria-controls="VECTORBORNEDISEASES" aria-selected="false"><?php echo $lang['vector_borne_diseases']; ?></button>
                                        </li>
                                        <li role="presentation" class="liststyleNone">
                                            <button class="nav-link"   data-bs-toggle="pill" data-bs-target="#COMMUNICABLEDISEASES" type="button" role="tab" aria-controls="COMMUNICABLEDISEASES" aria-selected="false"><?php echo $lang['communicable_diseases']; ?></button>
                                        </li>
                                        <li role="presentation" class="liststyleNone">
                                             <button class="nav-link"   data-bs-toggle="pill" data-bs-target="#NON-COMMUNICABLEDISEASES" type="button" role="tab" aria-controls="NON-COMMUNICABLEDISEASES" aria-selected="false"><?php echo $lang['non_communicable_diseases']; ?></button>
                                        </li>
                                        <li role="presentation" class="liststyleNone">
                                             <button class="nav-link"   data-bs-toggle="pill" data-bs-target="#GENETICDISORDERS" type="button" role="tab" aria-controls="GENETICDISORDERS" aria-selected="false"><?php echo $lang['genetic_disorders']; ?></button>
                                        </li>

                                        <li role="presentation" class="liststyleNone">
                                                <button class="nav-link"   data-bs-toggle="pill" data-bs-target="#VIROLOGYZOONOTICDISEASES" type="button" role="tab" aria-controls="VIROLOGYZOONOTICDISEASES" aria-selected="false"><?php echo $lang['virology_zoonotic_diseases']; ?></button>
                                        </li>
                                      </ul>
    
                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="VECTORBORNEDISEASES">
                                            
                                           <div class="liststyle">
                                    <ul class="cs-iconlist has-border">
<?php if($_SESSION['language']=='hi'){ ?>
    <li><i class="icon-lab"></i>मेडिकल इनोवेशन फंड (2016-2019) के तहत प्लास्मोडियम विवैक्स जीनोमिक्स पर आईसीएमआर वित्त पोषित अनुसंधान परियोजना।</li>
    <li><i class="icon-lab"></i>मलेरिया डायग्नोसिस (निदान) एवं ड्रग-रेजिस्टेंस जीनोटाइपिंग (कैनेडियन पीआई: डॉ. स्टेफनी यानो) के लिए पॉइंट-ऑफ-केयर (देखभाल-बिंदु) असे पर इंडो-कैनेडियन (आईसी-इम्पैक्ट्स) वित्त पोषित अनुसंधान परियोजना।</li>
    <li><i class="icon-lab"></i>सेंटर फॉर स्टडी ऑन द कॉम्पलैक्स मलेरिया इन इंडिया (सीएससीएमआई) पर एनआईएच वित्त पोषित परियोजना; यूएस पीआई: प्रो. जेन कार्लटन</li>
    <li><i class="icon-lab"></i>पी. फाल्सीपेरम प्रोटिओमिक्स (पीआई: डॉ. पी. आचार्य, एम्स, नई दिल्ली) पर डीएसटी वित्त पोषित अनुसंधान परियोजना</li>
    <li><i class="icon-lab"></i>भारत में 4 जनजातीय प्रभुत्व वाले राज्यः मध्य प्रदेश, महाराष्ट्र, छत्तीसगढ़ और ओडिशा में अपूर्ण प्लाज्मोडियम फाल्सीपेरम मलेरिया के उपचार के लिए आर्टेमेथेर-ल्यूमफैंट्रिन (एएल) संयोजन थेरेपी की प्रभावकारिता और सुरक्षा। डब्ल्यूएचओ, अप्रैल - दिसम्बर - 2017</li>
    <li><i class="icon-lab"></i>गर्भावस्था के दौरान मलेरिया से बचाव के लिए हस्तक्षेपी उपायों का एक आंकलनः मध्य भारत में एक संभावी देशांतरीय अध्ययन। भारतीय आयुर्विज्ञान अनुसंधान परिषद (आईसीएमआर) भारत, जुलाई 2015 - दिसम्बर 2017</li>
    <li><i class="icon-lab"></i>जगदलपुर, छत्तीसगढ़ में जनजातीय स्वास्थ्य अनुसंधान इकाई की स्थापना। भारतीय आयुर्विज्ञान अनुसंधान परिषद (आईसीएमआर) भारत, सितंबर 2013 - अगस्त 2018.</li>
    <li><i class="icon-lab"></i>भारत के ओड़ीसा राज्‍य से प्लाज्मोडियम फाल्सीपेरम परजीवी में एचआरपी2 और एचआरपी3 जीन पर अध्ययन : एक संभावी मूल्यांकन। टाटा ट्रस्ट, अप्रैल 2017 - मार्च 2018.</li>
    <li><i class="icon-lab"></i>भारत में मलेरिया के वेक्टर एनोफिलिस क्लुसिफाइस के विरूद्ध लंबे समय तक चलने वाले आंतरिक (इनडोर) अवशिष्ट छिड़काव डेल्टामेथ्रिन 62.5 एससी-पीई के चरण III का मूल्यांकन। वित्त पोषित: आईसीएमआर (बायर क्रॉप साइंस), 2017-18।</li>
    <li><i class="icon-lab"></i>मध्य प्रदेश में मलेरिया ट्रांसमिशन में मलेरिया वेक्टर की बायोनोमिक्स - सिबलिंग प्रजाति की रचना और उसकी भूमिका स्थापित करना। वित्त पोषित: आईसीएमआर टास्कफोर्स, 2017-18।</li>
    <li><i class="icon-lab"></i>मध्य प्रदेश राज्य में मलेरिया वैक्टर में कीटनाशक प्रतिरोध की निगरानी। वित्त पोषित: आईसीएमआर टास्कफोर्स, 2017-18.</li>
    <li><i class="icon-lab"></i>मध्य प्रदेश के मंडला जिले में मलेरिया उन्मूलन (एक सार्वजनिक-निजी-भागीदारी (पीपीपी) परियोजना। वित्त पोषण: सन फार्मास्युटिकल इंडस्ट्रीज लिमिटेड, 2017-22.</li>
    <li><i class="icon-lab"></i>ओडिशा में 8 स्थानिक जिलों से प्लाज्मोडियम फाल्सीपेरम परजीवी में एचआरपी2 और एचआरपी3 जीन पर अध्ययन: एक संभावी मूल्यांकन, 2017-18. वित्त पोषित टाटा ट्रस्ट।</li>

<?php } else { ?>
    <li><i class="icon-lab"></i> ICMR funded research project on Plasmodium vivax genomics under the Medical Innovation Fund (2016-2019)</li>
    <li><i class="icon-lab"></i> Indo-Canadian (IC-IMPACTS) funded research project on point-of-care assay for malaria diagnosis and drug-resistance genotyping (Canadian PI: Dr. Stephanie Yanow)</li>
    <li><i class="icon-lab"></i> NIH funded project on Centre for Study on the Complex malaria in India (CSCMi); US PI: Prof. Jane carlton</li>
    <li><i class="icon-lab"></i> DST funded research project on P. falciparum proteomics (PI: Dr. P. Acharya, AIIMS, New Delhi)</li>
    <li><i class="icon-lab"></i> Efficacy and safety of artemether-lumefantrine (AL) combination therapy for the treatment of uncomplicated Plasmodium falciparum malaria in 4 Tribal dominating states in India: Madhya Pradesh, Maharashtra, Chhattisgarh and Odisha. WHO,&nbsp;Apr &nbsp;-Dec- 2017.</li>
    <li><i class="icon-lab"></i> An assessment of intervention measures for prevention of malaria in pregnancy: A prospective longitudinal study in Central India. Indian Council of Medical Research (ICMR) India, July 2015 &ndash;Dec 2017.</li>
    <li><i class="icon-lab"></i> Setting up of Tribal Health Research Unit at Jagdalpur, Chhattisgarh. Indian Council of Medical Research (ICMR) India, Sep 2013 &ndash; Aug 2018.</li>
    <li><i class="icon-lab"></i> Study on HRP2 and HRP3 gene in plasmodium falciparum parasite from Odisha states India: A prospective evaluation. Tata Trust, April 2017 &ndash;Mar 2018.</li>
    <li><i class="icon-lab"></i> Phase III evaluation of Deltamethrin 62.5 SC-PE long lasting indoor residual spraying against An. culicifacies, the vector of malaria in India. Funding: ICMR (Bayer Crop Science), 2017-18.</li>
    <li><i class="icon-lab"></i> Bionomics of Malaria Vector - sibling species composition and to establish their role in malaria transmission in Madhya Pradesh. Funding: ICMR Taskforce, 2017-18.</li>
    <li><i class="icon-lab"></i> Monitoring of insecticide resistance in malaria vectors in Madhya Pradesh state. Funding: ICMR Taskforce, 2017-18.</li>
    <li><i class="icon-lab"></i> Malaria elimination in Mandla district of Madhya pradesh&nbsp; (A public-private-partnership (ppp) project. Funding: Sun Pharmaceutical Industries Limited, 2017-22.</li>
    <li><i class="icon-lab"></i> Study on HRP2 and HRP3 gene in Plasmodium falciparum parasites from 8 endemic districts in Odisha: A prospective evaluation, 2017-18. Funding Tata Trust.</li>
<?php } ?>
</ul>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="COMMUNICABLEDISEASES">
                                            <div class="liststyle">
                                    <ul class="cs-iconlist has-border">
<?php if($_SESSION['language']=='hi'){ ?>
    <li><i class="icon-lab"></i>संशोधित राष्ट्रीय टीबी नियंत्रण कार्यक्रम, भारत के तहत जनजातीय आबादी में टीबी नियंत्रण पर व्यय और शक्ति प्रदान करने के लिए लक्षित अंतःक्षेप।</li>
    <li><i class="icon-lab"></i>मध्य प्रदेश जिला गुना के सहरिया जनजाति में तीव्र यक्ष्मा (ट्यूबरकुलोसिस) रोग नियंत्रण।</li>
    <li><i class="icon-lab"></i>एमडीआर का पता लगाने के लिए लाइन प्रोब असे और एक्सपर्ट एमटीबी/आरआईएफ का तुलनात्मक अध्ययन (आईसीएमआर, नई दिल्ली द्वारा वित्त पोषित)।</li>
    <li><i class="icon-lab"></i>कल्चर से एम. ट्यूबरक्लोसिस का समय पूर्व पता लगाने हेतु इम्यूनोविजुअल जांच-प्रणाली तैयार करना (टाटा ट्रस्ट्स, मुंबई द्वारा वित्त पोषित)।</li>
    <li><i class="icon-lab"></i>नमूनों/थूक से प्रत्यक्ष माइकोबैक्टीरियम ट्यूबरकुलोसिस एंटीजन का पता लगाने के लिए इम्यूनो-लैम्प का उपयोग करके एमटीबी-एंटीजन की उच्च संवेदनशीलता की जांच की तैयारी करना और विकास करना (इंटरनेशनल सोसाइटी फॉर इंफेक्शियस डिसीज़, ब्रुकलिन, यूएसए द्वारा वित्त पोषित)</li>

<?php } else { ?>
    <li><i class="icon-lab"></i> Targeted Intervention to expend and strengthen TB control in tribal population under revised National TB control Programme, India.</li>
    <li><i class="icon-lab"></i> Intensified Tuberculosis Control among Saharia tribe of M.P. District Guna.</li>
    <li><i class="icon-lab"></i> Comparative study of line probe assay and Xpert MTB/RIF for detection of MDR (Funded by ICMR, New Delhi).</li>
    <li><i class="icon-lab"></i> Designing a immunovisual assay for early detection of&nbsp;<em>M. tuberculosis</em>&nbsp;from culture (Funded by TATA Trusts, Mumbai).</li>
    <li><i class="icon-lab"></i> To design and develop high sensitivity detection of MTB-antigens using Immuno-LAMP to detect Mycobacterium tuberculosis antigens directly from specimens/sputum (Funded by International Society for Infectious Diseases, Brooklyn, USA)</li>
<?php } ?>                                    
                                    </ul>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="NON-COMMUNICABLEDISEASES">
                                            <div class="liststyle">
                                    <ul class="cs-iconlist has-border">
<?php if($_SESSION['language']=='hi'){ ?> 
    <li><i class="icon-lab"></i> भारत में जनजातीय आबादी के बीच गैर-संक्रामक रोगों और मृत्यु के कारण के लिए स्वास्थ्य प्रणालियों की तैयारी: आईसीएमआर टास्क फोर्स प्रोजेक्ट (डिवीजन ऑफ एनसीडी)।</li>
    <li><i class="icon-lab"></i> मध्य प्रदेश के डिंडोरी जिले के बैगा जनजाति में स्कैबिज के प्रबंधन के लिए अंतःक्षेप कार्यक्रम।</li>
    <li><i class="icon-lab"></i> भारत के चयनित जिलों के समुदाय में फ्लोरोसिस की रोकथाम और फ्लोरोसिस की रोकथाम और नियंत्रण के लिए एक उपयुक्त अंतःक्षेप मॉडल का विकास (मल्टी-सेंट्रिक आईसीएमआर टास्कफोर्स स्टडी).</li>
<?php } else { ?>
    <li><i class="icon-lab"></i> Health systems preparedness for interventions for Non-communicable diseases and cause of death among the tribal population in India:ICMR Task Force Project (Division of NCD).</li>
    <li><i class="icon-lab"></i> Intervention Programme for the Management of Scabies - Baiga Tribe of Dindori district of Madhya Pradesh.</li>
    <li><i class="icon-lab"></i> Prevalence of Fluorosis in The Community of Selected Districts of India and Development of an Appropriate Intervention Model For Prevention and Control of Fluorosis (Multi-Centric ICMR Taskforce Study).</li>
<?php } ?>                                   

                                    </ul>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="GENETICDISORDERS">
                                            <div class="liststyle">
                                    <ul class="cs-iconlist has-border">

                                        <ul>
<?php if($_SESSION['language']=='hi'){ ?> 
    <li><i class="icon-lab"></i> मध्य प्रदेश में हीमोग्लोबिनोपैथीज़ की जांच।</li>
    <li><i class="icon-lab"></i> भारतीय स्थिति के तहत एक नई सिकल सेल डायग्नोस्टिक डिवाइस-सिकल स्कैन® का पायलट सत्यापन अध्ययन।</li>
    <li><i class="icon-lab"></i> भारत के आदिवासियों के बीच जी6पीडी की कमी का सूक्ष्म मानचित्रण (माइक्रो मैपिंग) और एंटीमलेरियल थेरेपी के लिए इसका महत्व।</li>
    <li><i class="icon-lab"></i> मलेरिया स्थानिक क्षेत्रों में रहने वाली जनजातीय आबादी और एंटी-मलेरिया थेरेपी के साथ इसके संबंध के बीच जी6पीडी की कमी की जाँच।</li>
    <li><i class="icon-lab"></i> अल्फा हीमोग्लोबिन चेन वेरिएंट के लिए विशेष संदर्भ में नरसिंहपुर जिले में हीमोग्लोबिनोपैथिज की जाँच।</li>
    <li><i class="icon-lab"></i> सिकल सेल एनीमिया के लिए पेपर आधारित स्क्रीनिंग टेस्ट का मूल्यांकन</li>
<?php } else { ?>
    <li><i class="icon-lab"></i> Screening of hemoglobinopathies in Madhya Pradesh.</li>
    <li><i class="icon-lab"></i> Pilot Validation Studies of a new sickle cell diagnostic device- Sickle SCAN&reg; under Indian Condition.</li>
    <li><i class="icon-lab"></i> Micro mapping of G6PD deficiency among the tribals of India and its importance for antimalarial therapy.</li>
    <li><i class="icon-lab"></i> Screening for G6PD deficiency among the tribal populations living in Malaria endemic zones and its correlation with anti-malarial therapy.</li>
    <li><i class="icon-lab"></i> Screening of Hemoglobinopathies in Narsingpur District with special reference to alpha haemoglobin chain variants.</li>
    <li><i class="icon-lab"></i> Evaluation of paper based screening test for Sickle cell anemia</li>
<?php } ?>      
                                    </ul>   

                                            </div>


                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="VIROLOGYZOONOTICDISEASES">
                                            <div class="liststyle">
                                    <ul class="cs-iconlist has-border">

                                        <ul>
<?php if($_SESSION['language']=='hi'){ ?> 
    <li><i class="icon-lab"></i>भारतीय आयुर्विज्ञान अनुसंधान परिषद, नई दिल्ली (2012 के बाद से जारी) द्वारा वित्त पोषित ग्रेड II वायरोलॉजी प्रयोगशाला की स्थापना।</li>
    <li><i class="icon-lab"></i>स्वास्थ्य एवं परिवार कल्याण विभाग, मध्य प्रदेश सरकार द्वारा वित्त पोषित, मध्यप्रदेश के आदिवासी-ग्रामीण क्षेत्रों में डेंगू के लिए रैपिड डायग्नोस्टिक टेस्ट किट के मूल्यांकन पर पायलट अध्ययन । (सितंबर 2016 से जारी)।</li>
    <li><i class="icon-lab"></i>सार्वजनिक स्वास्थ्य समुदाय में जैव-जोखिम शमन जागरूकता बढ़ाना और एनआईवी पुणे/सीडीसी यूएसए द्वारा वित्त पोषित वायरल रक्तस्रावी बुखार और श्वसन संक्रमण के कारण उच्च जोखिम वाले समूह वायरल रोगजनकों की निगरानी और प्रकोप से निपटने के लिए बढ़ी हुई नैदानिक क्षमताओं के लिए प्रयोगशाला नेटवर्क बनाना। (सितंबर 2016 से जारी)।</li>
    <li><i class="icon-lab"></i>राष्ट्रीय वेक्टर जनित रोग नियंत्रण कार्यक्रम, नई दिल्ली द्वारा एमपी और सीजी के लिए डेंगू और चिकनगुनिया की लिए एपेक्स रेफरल प्रयोगशाला (अप्रैल 2011 से चालू होने वाली परियोजना)।</li>
    <li><i class="icon-lab"></i>भारत में डेंगू वायरस के संक्रमण की व्यापकता का अनुमान लगाने के लिए एक बहु-केन्द्रित अध्ययन (चार महीने सितम्बर 2017 से दिसम्बर 2017 की लघु अवधि परियोजना)</li>
<?php } else { ?>
    <li><i class="icon-lab"></i> Establishment of grade II virology laboratory funded by Indian Council of Medical Research, New Delhi&nbsp; (Ongoing since 2012).</li>
    <li><i class="icon-lab"></i> Pilot study on evaluation of rapid diagnostic test kit for dengue in tribal- rural areas of Madhya Pradesh, funded by Department of Health and Family welfare, Govt. of MP. (Ongoing since September 2016).</li>
    <li><i class="icon-lab"></i> Enhancing Biorisk mitigation awareness in public health community and creating laboratory networks for enhanced diagnostic capabilities to deal with surveillance and outbreaks of high-risk group viral pathogens causing viral hemorrhagic fevers and respiratory infections funded by NIV Pune/CDC USA.&nbsp; (Ongoing since September 2016).</li>
    <li><i class="icon-lab"></i> Apex Referral Laboratory for Dengue and Chikungunya for MP and CG funded by National Vector Borne Disease control Program, New Delhi&nbsp; (Service Project Ongoing since April 2011).</li>
    <li><i class="icon-lab"></i> A Multi-Centric Study to estimate the sero-prevalence of dengue virus infection in India (Short term project for four months Sept 2017 to Dec. 2017)</li>
<?php } ?>

                                       
                                    </ul>   

                                            </div>


                                        </div>
                                      </div>
                                    </div>
                    </div>
            
                   
          
                    
                </div>

              </div>

            </div>

          </div>
           <div class="page-section">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="row cs-testimonial">
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/1.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/2.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/3.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/4.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/5.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/6.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/7.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/8.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/9.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    
                </ul>
            </div>
        </div>
        </div>
	</div>
	<!-- Main End --> 
	
	<!-- Footer Start -->
	<?php include("footer.php");?>
	<!-- Footer End --> 
</div>

<script src="assets/scripts/responsive.menu.js"></script> 
<script src="assets/scripts/chosen.select.js"></script> 
<script src="assets/scripts/slick.js"></script>
<script src="assets/scripts/jquery.mobile-menu.min.js"></script> 
<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>
</body>
</html>