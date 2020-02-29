<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model
{
     protected $fillable = ['user_id', 'work_exp', 'hold_offer', 'eng_commrate', 'other_languages','', 'academic_projname', 'academic_projdesc', 'academic_projtype', 'competitive_exam','score_type', 'score', 'certification', 'cert_passyr', 'cert_passmonth', 'training_course', 'training_instname', 'dur_frommonth', 'dur_fromyr', 'dur_tomonth', 'dur_toyr', 'training_details', 'achievements1', 'achievements2', 'achievements3', 'brief_desc', 'skills'];
    protected $table = 'career_details'; 

    const WORK_EXPERIENCE = [
    	1 => 'Fresher',
    	2 => 'Experienced',
    ];

    const HOLD_OFFER = [
    	1 => 'Yes',
    	0 => 'No',
    ];
    const ENG_RATE = [
        1 => '0 (None) : Do not understand English',
        2 => '1 (Basic) : Basic English Only',
        3 => '3 (Good) : Good Indian English Accent',
        4 => '4 (Excellent) : Excellent English Accent',
        4 => '5 (Exceptional) : International Accent',
    ];
    const ACADEMIC_PROJTYPE = [
		1 => 'My Project',
		2 => 'Mini Project',
		3 => 'My Seminar',
		4 => 'My Presentation',
		5 => 'My Case Study',
	];
	const SCORE_TYPE = [
		1 => 'Percentage',
		2 => 'Percentile',
		3 => 'Rank',
	];	
    const OTHER_LANG = [
		1 => 'Bengali',
		2 => 'Gujarati',
		3 => 'Hindi',
		4 => 'Kannada',
		5 => 'Malayalam',
		6 => 'Marathi',
		7 => 'Punjabi',
		8 => 'Tamil',
		9 => 'Telugu',
		10 => 'Urdu',
		11 => 'Arabic',
		12 => 'Bulgarian',
		13 => 'Burmese',
		14 => 'Chinese',
		15 => 'Croatian',
		16 => 'Czech',
		17 => 'Danish',
		18 => 'Dutch',
		19 => 'Farsi',
		20 => 'French',
		21 => 'German',
		22 => 'Greek',
		23 => 'Hebrew',
		24 => 'Italian',
		25 => 'Japanese',
		26 => 'Korean',
		27 => 'Mandarin',
		28 => 'Nepali',
		29 => 'Polish',
		30 => 'Portuguese',
		31 => 'Romanian',
		32 => 'Russian',
		33 => 'Slovenian',
		34 => 'Spanish',
		35 => 'Swahili',
		36 => 'Swedish',
		37 => 'Tagalog',
		38 => 'Thai',
		39 => 'Turkish'
	];

	const COMPETITIVE_EXAMS = [
		1 => 'AICEE',
		2 => 'AIEEE',
		3 => 'AIPMT',
		4 => 'CAT',
		5 => 'CDS',
		6 => 'CLAT',
		7 => 'DCEE',
		8 => 'GATE',
		9 => 'GIC',
		10 => 'GMAT',
		11 => 'GRE',
		12 => 'Civil Service',
		13 => 'ICFAI',
		14 => 'IES',
		15 => 'IIT JEE',
		16 => 'LDC',
		17 => 'LIC',
		18 => 'LSAT',
		19 => 'MAT',
		20 => 'MCAT',
		21 => 'MCET',
		22 => 'NAT',
		23 => 'NDA',
		24 => 'NET',
		25 => 'SAT',
		26 => 'SET',
		27 => 'SNAP',
		28 => 'SSC',
		29 => 'TOEFL/IELTS',
		30 => 'UDC',
		31 => 'WBJEE',
		32 => 'XAT'
	];
	const CERTIFICATION = [
		1 => 'Microsoft Certified Application Developer (MCAD)',
		2 => 'Microsoft Certified IT Professional (MCITP)',
		3 => 'Microsoft Certified Trainer (MCT)',
		4 => 'Microsoft Technology Associate (MTA)',
		5 => 'Red Hat Certified System Administrator (RHCSA)',
		6 => 'Red Hat Certified Engineer (RHCE)',
		7 => 'Red Hat Certified Architect (RHCA)',
		8 => 'Cisco Certified Network Associate (CCNA)',
		9 => 'Cisco Certified Internetwork Professional (CCIP)',
		10 => 'Cisco Certified Network Professional(CCNP)',
		11 => 'Cisco Certified Internetwork Expert(CCIE)',
		12 => 'Oracle Certified Java Programmer(OCJP)',
		13 => 'Oracle Certified Associate (OCA)',
		14 => 'Oracle Certified Professional (OCP)',
		15 => 'IBM DB2 Certifications',
		16 => 'Certified Associate in Software Testing (CAST)',
		17 => 'IIHT Certified Cloud Expert (ICCE)',
		18 => 'VMware Certified Professional',
		19 => 'SAS Certified Base Programmer for SAS 9',
		20 => 'HP Master ASE - Network Infrastructure',
		21 => 'W3Schools Certification',
		-1 => 'Other'
	];

	const PASSOUT = [
        1 => 'JAN',
        2 => 'FEB',
        3 => 'MAR',
        4 => 'APR',
        5 => 'MAY',
        6 => 'JUN',
        7 => 'JUL',
        8 => 'AUG',
        9 => 'SEP',
        10 => 'OCT',
        11 => 'NOV',
        12 => 'DEC',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
