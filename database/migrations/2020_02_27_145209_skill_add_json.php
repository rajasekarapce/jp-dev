<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Skill;

class SkillAddJson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $skillList='[{"id":46,"name":"ABAP"},{"id":47,"name":"Accounting"},{"id":48,"name":"Ajax"},{"id":49,"name":"Analytics"},{"id":18,"name":"Android Developer"},{"id":50,"name":"Angular JS"},{"id":51,"name":"Animation"},{"id":53,"name":"Architecture"},{"id":25,"name":"Artificial Intelligence"},{"id":3,"name":"ASP.NET"},{"id":4,"name":"Assembly Language"},{"id":54,"name":"Auditing"},{"id":35,"name":"AutoCAD"},{"id":55,"name":"AWS"},{"id":56,"name":"Azure"},{"id":57,"name":"Backup"},{"id":58,"name":"Banking"},{"id":59,"name":"Bidder"},{"id":60,"name":"Big Data"},{"id":61,"name":"Billing"},{"id":19,"name":"BlackBerry Development"},{"id":62,"name":"Bluemix"},{"id":36,"name":"BPO"},{"id":64,"name":"Budgeting"},{"id":6,"name":"C"},{"id":65,"name":"C#"},{"id":7,"name":"C++"},{"id":66,"name":"CA"},{"id":67,"name":"CAD"},{"id":68,"name":"CAE"},{"id":69,"name":"CAM"},{"id":70,"name":"Cash Flow"},{"id":71,"name":"CCNA"},{"id":5,"name":"COBOL"},{"id":72,"name":"Cocoa"},{"id":74,"name":"Cognos"},{"id":76,"name":"Consulting"},{"id":78,"name":"Content writing"},{"id":79,"name":"Corel Draw"},{"id":80,"name":"Costing"},{"id":191,"name":"CRM"},{"id":83,"name":"CSS"},{"id":84,"name":"Database Integration"},{"id":42,"name":"Data Warehousing"},{"id":85,"name":"DCS"},{"id":89,"name":"Design"},{"id":90,"name":"Digital Media Marketing"},{"id":91,"name":"Drupal"},{"id":37,"name":"DSP"},{"id":93,"name":"Elastic Search"},{"id":24,"name":"Embedded System"},{"id":95,"name":"Event management"},{"id":96,"name":"ExtJS"},{"id":97,"name":"Finance"},{"id":98,"name":"Flash"},{"id":100,"name":"Google Apps"},{"id":101,"name":"Groovy"},{"id":39,"name":"Hadoop"},{"id":103,"name":"Heroku"},{"id":104,"name":"Hospitality Management"},{"id":106,"name":"HR"},{"id":8,"name":"HTML"},{"id":108,"name":"Illustrator"},{"id":110,"name":"iOS"},{"id":17,"name":"iPhone Development"},{"id":190,"name":"ITES"},{"id":33,"name":"IT-Hardware"},{"id":111,"name":"J2EE"},{"id":9,"name":"Java"},{"id":112,"name":"JavaScript"},{"id":12,"name":"Joomla"},{"id":113,"name":"Jquery"},{"id":114,"name":"Law"},{"id":115,"name":"Leadership"},{"id":27,"name":"Linux"},{"id":119,"name":"Magento"},{"id":120,"name":"Mailer Server"},{"id":23,"name":"Mainframe"},{"id":122,"name":"Marketing Management"},{"id":123,"name":"MATLAB"},{"id":124,"name":"MCITP"},{"id":45,"name":"Micro-Controller"},{"id":125,"name":"Microsoft excel"},{"id":15,"name":"Microsoft(MS)Access"},{"id":14,"name":"MicroSoft(MS)SQL"},{"id":128,"name":"MIS Reporting"},{"id":21,"name":"Mobile Testing"},{"id":129,"name":"MongoDB"},{"id":164,"name":"MySQL"},{"id":134,"name":"Network Admin"},{"id":135,"name":"NoSQL"},{"id":136,"name":"Operations Management"},{"id":13,"name":"Oracle"},{"id":138,"name":"Payroll"},{"id":26,"name":"Perl"},{"id":43,"name":"Photoshop"},{"id":10,"name":"PHP"},{"id":41,"name":"PLC"},{"id":144,"name":"Press Release"},{"id":146,"name":"Proof Reading"},{"id":147,"name":"Public Speaking"},{"id":127,"name":"Python"},{"id":150,"name":"QTP"},{"id":151,"name":"R langauge"},{"id":152,"name":"Rackspace"},{"id":153,"name":"RDS"},{"id":30,"name":"Robotics and Automation"},{"id":44,"name":"Ruby on Rails (ROR)"},{"id":155,"name":"Sales"},{"id":22,"name":"SAP"},{"id":156,"name":"SCADA"},{"id":157,"name":"Scala"},{"id":159,"name":"Secretary"},{"id":161,"name":"selenium"},{"id":11,"name":"SEO"},{"id":162,"name":"Sharepoint"},{"id":163,"name":"Simulink"},{"id":28,"name":"Software Testing"},{"id":165,"name":"Solr"},{"id":166,"name":"SPSS tool"},{"id":167,"name":"SQS"},{"id":168,"name":"Stock Trading"},{"id":170,"name":"System Integration"},{"id":32,"name":"Tally"},{"id":171,"name":"Tax"},{"id":172,"name":"Team Building"},{"id":174,"name":"Tech Support"},{"id":40,"name":"Telecom Software"},{"id":177,"name":"Time Management"},{"id":178,"name":"Titanium"},{"id":179,"name":"Transcription"},{"id":180,"name":"Translation"},{"id":181,"name":"Troubleshooting"},{"id":182,"name":"Unix"},{"id":2,"name":"VB"},{"id":189,"name":"Verilog"},{"id":184,"name":"VFX\/Maya (Animation Skills)"},{"id":29,"name":"VLSI"},{"id":185,"name":"W3C Validation"},{"id":186,"name":"Web Designing"},{"id":187,"name":"Wordpress"},{"id":192,"name":"Advertisement and Marketing"},{"id":193,"name":"ATLC"},{"id":194,"name":"Axapta"},{"id":195,"name":"Bootstrap"},{"id":196,"name":"Business Analytics"},{"id":197,"name":"Business Development"},{"id":198,"name":"Call Center"},{"id":199,"name":"CATIA"},{"id":200,"name":"Cake PHP"},{"id":201,"name":"CodeIgniter"},{"id":202,"name":"Cold Calling"},{"id":203,"name":"Computer Operater"},{"id":204,"name":"CPLEX"},{"id":205,"name":"Customer Care Executive"},{"id":206,"name":"Customer Relationship"},{"id":207,"name":"Customer Service"},{"id":208,"name":"Data Entry"},{"id":209,"name":"DBMS\/RDBMS"},{"id":210,"name":"Delivery"},{"id":211,"name":"DMLT"},{"id":212,"name":"DTP"},{"id":213,"name":"Electrical Designer"},{"id":214,"name":"E-mail Marketing"},{"id":215,"name":"English Speaking"},{"id":216,"name":"Entity Framework "},{"id":217,"name":"ETL QA"},{"id":218,"name":"Fashion Design"},{"id":219,"name":"Field Networking"},{"id":220,"name":"Field Sales"},{"id":221,"name":"Freelancer"},{"id":222,"name":"Game Developer"},{"id":223,"name":"Hardware & Networking"},{"id":224,"name":"Hardware Architecture "},{"id":225,"name":"Hardware Installation "},{"id":226,"name":"Hardware Maintenance "},{"id":227,"name":"Hindi Speaking"},{"id":228,"name":"HVAC"},{"id":229,"name":"IAAS"},{"id":230,"name":"IATA"},{"id":231,"name":"Inbound Calling"},{"id":232,"name":"International BPO"},{"id":233,"name":"IT Staffing"},{"id":234,"name":"JDBC"},{"id":235,"name":"Jmeter"},{"id":236,"name":"Journalism"},{"id":237,"name":"Json"},{"id":238,"name":"Kannada Speaking"},{"id":239,"name":"KPO"},{"id":240,"name":"Laravel"},{"id":241,"name":"LMS"},{"id":242,"name":"Machine Learning"},{"id":243,"name":"Malayalam Speaking"},{"id":244,"name":"Market Research"},{"id":245,"name":"Marketing"},{"id":246,"name":"Medical Representative"},{"id":247,"name":"Merchandising"},{"id":248,"name":"Microprocessor"},{"id":249,"name":"Mobile App Development"},{"id":250,"name":"Moodle"},{"id":251,"name":"MVC"},{"id":252,"name":"Network Security "},{"id":253,"name":"Node JS"},{"id":254,"name":"Nursing "},{"id":255,"name":"Office Admin"},{"id":256,"name":"Online Bidding"},{"id":257,"name":"Online Marketing"},{"id":258,"name":"OOPS"},{"id":259,"name":"Outbound Sales "},{"id":260,"name":"Pharma"},{"id":261,"name":"Physician"},{"id":262,"name":"PL\/SQL"},{"id":263,"name":"PPC"},{"id":264,"name":"Production"},{"id":265,"name":"Product Management "},{"id":266,"name":"Purchasing"},{"id":267,"name":"Quality Control"},{"id":268,"name":"Retail"},{"id":270,"name":"SDLC"},{"id":271,"name":"SEM"},{"id":272,"name":"Server Administration"},{"id":273,"name":"Shop Keeping"},{"id":274,"name":"SOAP"},{"id":275,"name":"Social Media Marketing"},{"id":276,"name":"Software Architecture"},{"id":277,"name":"Software Automation "},{"id":278,"name":"Software Development"},{"id":279,"name":"Spring"},{"id":280,"name":"SQLite"},{"id":281,"name":"Staff Nurse"},{"id":282,"name":"Staffing and Recruiting"},{"id":283,"name":"STLC"},{"id":284,"name":"Struts"},{"id":285,"name":"Symfony"},{"id":286,"name":"Talend"},{"id":287,"name":"Tamil Speaking"},{"id":288,"name":"Teaching"},{"id":289,"name":"Telecaller"},{"id":290,"name":"Telugu Speaking"},{"id":291,"name":"Tomcat"},{"id":292,"name":"Typist \/ Typewriter"},{"id":293,"name":"UI Designer"},{"id":294,"name":"US Calling"},{"id":295,"name":"VB.Net"},{"id":296,"name":"Video Editing "},{"id":297,"name":"Video Making"},{"id":298,"name":"Voice Support"},{"id":299,"name":"WCF"},{"id":300,"name":"Web Analytics"},{"id":301,"name":"WPF"},{"id":302,"name":"WSDL"},{"id":303,"name":"XML"},{"id":304,"name":"YII"}]';
        $insertSkill = [];
        $skills  = json_decode($skillList);
        $now = \Carbon\Carbon::now();
        foreach ($skills as $key => $data) {
            $insertSkill[] = ['name' => $data->name, 'status' => 1, 'created_at' => $now, 'updated_at' => $now];
        }
        DB::table('skills')->insert($insertSkill);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
