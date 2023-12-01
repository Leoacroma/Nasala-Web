@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
<!-- Content title -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 col-12 d-flex">
            <i class="icon-size-rps fa-solid fa-book-open-reader mg-r-10px color-blue-355fb6"></i>
            <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Department of National School of Local Administration') }}</h2>
        </div>
    </div>
    <div class="col-md-12 divider-line "></div>
  </div>
</div>
{{-- <div class="container mt-4">
        <div class="row">
            <div class="col-12 Kantumruy">
                <p><strong>១.នាយកដ្ឋានកិច្ចការទូទៅ ដឹកនាំដោយ <span class="badge badge-primary font-size-17">លោកស្រី ម៉ៅ ម៉ាលីស</span>
នាយកដ្ឋានកិច្ចការទូទៅ មានតួនាទីជាសេនាធិការលើការងារគ្រប់គ្រងបុគ្គលិក រដ្ឋបាល និងហិរញ្ញវត្ថុដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	ការងាររដ្ឋបាល គ្រប់គ្រងត្រា លិខិតចេញចូល និងឯកសារនានា<br>
&ensp;&ensp;-	រៀបចំកិច្ចប្រជុំ សិក្ខាសាលា និងកម្មវិធីផ្សេងៗ<br>
&ensp;&ensp;-	ការងារគ្រប់គ្រងបុគ្គលិក<br>
&ensp;&ensp;-	ការងារពិធីការ<br>
&ensp;&ensp;-	គ្រប់គ្រងចំណូល និងចំណាយ ស្របតាមនីតិវិធីជាធរមាន<br>
&ensp;&ensp;-	សម្របសម្រួលការងារលទ្ធកម្ម<br>
&ensp;&ensp;-	ការងារសន្តិសុខ សណ្តាប់ធ្នាប់ សុវត្ថិភាព និងអនាម័យ<br>
&ensp;&ensp;-	គ្រប់គ្រងបញ្ជីសារពើភណ្ឌ សម្ភារ បរិក្ខារ ចលនទ្រព្យ និងអចលនទ្រព្យ<br>
&ensp;&ensp;&ensp;&ensp;    • គ្រប់គ្រងអាហារដ្ឋាន និងអន្តេវាសិកដ្ឋាន<br>
&ensp;&ensp;&ensp;&ensp;    • ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
<strong>២.នាយកដ្ឋានបណ្តុះបណ្តាល ដឹកនាំដោយ <span class="badge badge-primary font-size-17 ">លោក  លឹម ពុទ្ធារី</span>
	នាយកដ្ឋានបណ្តុះបណ្តាល មានតួនាទីជាសេនាធិការលើការងារបណ្តុះបណ្តាល ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	អនុវត្តផែនការអភិវឌ្ឍន៍សមត្ថភាពរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	សម្របសម្រួលជាមួយសាស្ត្រាចារ្យ គ្រូបណ្តុះបណ្តាល និងវាគ្មិនដទៃទៀត<br>
&ensp;&ensp;-	ការងារចាត់បញ្ជូនមន្ត្រីចូលរួមការអភិវឌ្ឍសមត្ថភាពនៅក្នុងនិងក្រៅប្រទេស ក្នុងក្របខណ្ឌនៃសមត្ថកិច្ចរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	គ្រប់គ្រងការងារពាក់ព័ន្ធសិក្ខាកាម សិស្ស និស្សិត<br>
&ensp;&ensp;-	រៀបចំវិញ្ញាបនបត្របញ្ជាក់ការសិក្សា និងឬ សញ្ញាបត្រ ជូនសិក្ខាកាម និងឬ សិស្ស និស្សិត<br>
&ensp;&ensp;-	ពិនិត្យ វាយតម្លៃ និងចេញលិខិតបញ្ជាក់ការសិក្សាជូនមន្ត្រីរាជការស៊ីវិលនៅទីស្តីការក្រសួងមហាផ្ទៃ និងនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	សិក្សាស្រាវជ្រាវវិធីសាស្ត្រអភិវឌ្ឍន៍សមត្ថភាព<br>
&ensp;&ensp;-	ចងក្រងឯកសារពាក់ព័ន្ធការបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	រៀបចំ និងគ្រប់គ្រងទិន្នន័យអភិវឌ្ឍន៍សមត្ថភាព<br>
&ensp;&ensp;-	គ្រប់គ្រងសម្ភារឧបទេស និងបរិក្ខារសម្រាប់ការបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	តាមដាន គាំទ្រ និងផ្តល់អន្តរាគមន៍អភិវឌ្ឍន៍សមត្ថភាពដល់រដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	តាមដានត្រួតពិនិត្យ វាយតម្លៃ និងគាំទ្រការអភិវឌ្ឍសមត្ថភាពនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
&ensp;&ensp;<strong>២.១.នាយកដ្ឋានបណ្តុះបណ្តាល មានការិយាល័យដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;&ensp;&ensp;១. ការិយាល័យរដ្ឋបាលនិងបុគ្គលិក<br>
&ensp;&ensp;&ensp;&ensp;២. ការិយាល័យហិរញ្ញវត្ថុ<br>
&ensp;&ensp;&ensp;&ensp;៣. ការិយាល័យគ្រប់គ្រងទ្រព្យសម្បត្តិនិង​សណ្ដាប់ធ្នាប់​<br>
&ensp;&ensp;&ensp;&ensp;៤. ការិយាល័យជំនួយការ។<br>
<strong>៣.នាយកដ្ឋានផែនការ និងកិច្ចសហប្រតិបត្តិការ ដឹកនាំដោយ <span class="badge badge-primary font-size-17">លោក  ឯមតាន់ សុផានិត</span>
នាយកដ្ឋានផែនការ និងកិច្ចសហប្រតិបត្តិការ មានតួនាទីជាសេនាធិការលើការងារផែនការ យុទ្ធសាស្ត្រ និងកិច្ចសហប្រតិបត្តិការ ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;- រៀបចំផែនការយុទ្ធសាស្ត្ររយៈពេលមធ្យម និងវែងរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- រៀបចំផែនការសកម្មភាព និងថវិកាប្រចាំឆ្នាំរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ​​រៀបចំ និងអភិវឌ្ឍ​​យុទ្ធសាស្ត្រ​ កម្មវិធីសិក្សា និងកម្ម​​វិធី​​នានា​របស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ​ការងាររៀបចំ និងគ្រប់គ្រងគម្រោង<br>
&ensp;&ensp;- រៀបចំយុទ្ធសាស្រ្តនៃការប្រាស្រ័យទាក់ទង<br>
&ensp;&ensp;- សម្របសម្រួល និងស្វែងរកកិច្ចសហការជាមួយក្រសួង ស្ថាប័ន គ្រឹះស្ថានសិក្សា និងអ្នកពាក់ព័ន្ធនានាទាំងក្នុងនិងក្រៅប្រទេសលើការងារទស្សនកិច្ចសិក្សា កម្មវិធីផ្លាស់ប្តូរ កម្មសិក្សា សកម្មភាពសង្គម និងសកម្មភាពផ្សេងៗទៀត <br>
&ensp;&ensp;- តាមដានត្រួតពិនិត្យ និងវាយតម្លៃការអនុវត្តផែនការរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- រៀបចំរបាយការណ៍បូកសរុបលទ្ធផលការងារ និងទិសដៅបន្តរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។ <br>
&ensp;&ensp;<strong>៣.១.នាយកដ្ឋានផែនការ និងកិច្ចសហប្រតិបត្តិការ មានការិយាល័យដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;&ensp;&ensp;១. ការិយាល័យផែនការ <br>
&ensp;&ensp;&ensp;&ensp;២. ការិយាល័យយុទ្ធសាស្ត្រនិងអភិវឌ្ឍន៍កម្មវិធី<br>
&ensp;&ensp;&ensp;&ensp;៣. ការិយាល័យកិច្ចសហប្រតិបត្តិការ។<br>
<strong>៤.នាយកដ្ឋានស្រាវជា្រវ ដឹកនាំដោយ <span class="badge badge-primary font-size-17">លោក  លី ពៅមណីរត្ន</span>
នាយកដ្ឋានស្រាវជ្រាវ និងផ្សព្វផ្សាយ មានតួនាទីជាសេនាធិការលើការងារស្រាវជ្រាវ និងផ្សព្វផ្សាយ ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	ផ្តួចផ្តើមរៀបចំ ចងក្រង និងផ្សព្វផ្សាយគោលនយោបាយ និងលិខិតបទដ្ឋានគតិយុត្តពាក់ព័ន្ធការអភិវឌ្ឍសមត្ថភាព និងអភិបាលកិច្ច<br>
&ensp;&ensp;-	ស្រាវជ្រាវ និពន្ធ ចងក្រង និងផ្សព្វផ្សាយឯកសារ សៀវភៅពាក់ព័ន្ធអភិបាលកិច្ច ការអភិវឌ្ឍមូលដ្ឋាន ការលើកកម្ពស់ស្វ័យភាពមូលដ្ឋាន និងការគ្រប់គ្រងរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	រៀបចំ និងចងក្រងករណីសិក្សាបម្រើឱ្យការងារបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	តាមដាន វាយតម្លៃ និងលើកអនុសាសន៍ពាក់ព័ន្ធប្រព័ន្ធ ប្រសិទ្ធភាព និងគុណភាពនៃការអភិវឌ្ឍសមត្ថភាពនៅសាលាជាតិរដ្ឋបាលមូលដ្ឋាន និងនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	តាមដាន វាយតម្លៃ និងលើកអនុសាសន៍ពាក់ព័ន្ធការអនុវត្តច្បាប់ លិខិតបទដ្ឋានគតិយុត្ដ និងគោលនយោបាយពាក់ព័ន្ធ<br>
&ensp;&ensp;-	គ្រប់គ្រង និងធ្វើបច្ចុប្បន្នភាពគេហទំព័រ និងមធ្យោបាយទំនាក់ទំនងសង្គមរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន <br>
&ensp;&ensp;-	គ្រប់គ្រង និងគាំទ្រការងារព័ត៌មានវិទ្យារបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	ការងារគ្រប់គ្រងបណ្ណាល័យ និងបណ្ណសារដ្ឋាន <br>
&ensp;&ensp;-	ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
&ensp;&ensp;<strong>៤.១.នាយកដ្ឋានស្រាវជា្រវ មានការិយាល័យដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;&ensp;&ensp;១.  ការិយាល័យស្រាវជ្រាវនិងអភិវឌ្ឍន៍អភិបាលកិច្ចមូលដ្ឋាន<br>
&ensp;&ensp;&ensp;&ensp;២. ការិយាល័យផ្សព្វផ្សាយនិងព័ត៌មាន<br>
&ensp;&ensp;&ensp;&ensp;៣. ការិយាល័យគ្រប់គ្រងព័ត៌មានវិទ្យា<br>
&ensp;&ensp;&ensp;&ensp;៤. ការិយាល័យគ្រប់គ្រងបណ្ណាល័យនិងបណ្ណសារដ្ឋាន។<br></p>
            </div>
        </div>
</div> --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-12 Kantumruy">
            <p><strong>១.នាយកដ្ឋានកិច្ចការទូទៅ មានតួនាទីជាសេនាធិការលើការងារគ្រប់គ្រងបុគ្គលិក រដ្ឋបាល និងហិរញ្ញវត្ថុដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	ការងាររដ្ឋបាល គ្រប់គ្រងត្រា លិខិតចេញចូល និងឯកសារនានា<br>
&ensp;&ensp;-	រៀបចំកិច្ចប្រជុំ សិក្ខាសាលា និងកម្មវិធីផ្សេងៗ<br>
&ensp;&ensp;-	ការងារគ្រប់គ្រងបុគ្គលិក<br>
&ensp;&ensp;-	ការងារពិធីការ<br>
&ensp;&ensp;-	គ្រប់គ្រងចំណូល និងចំណាយ ស្របតាមនីតិវិធីជាធរមាន<br>
&ensp;&ensp;-	សម្របសម្រួលការងារលទ្ធកម្ម<br>
&ensp;&ensp;-	ការងារសន្តិសុខ សណ្តាប់ធ្នាប់ សុវត្ថិភាព និងអនាម័យ<br>
&ensp;&ensp;-	គ្រប់គ្រងបញ្ជីសារពើភណ្ឌ សម្ភារ បរិក្ខារ ចលនទ្រព្យ និងអចលនទ្រព្យ<br>
&ensp;&ensp;&ensp;&ensp;    • គ្រប់គ្រងអាហារដ្ឋាន និងអន្តេវាសិកដ្ឋាន<br>
&ensp;&ensp;&ensp;&ensp;    • ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
<strong>២.នាយកដ្ឋានបណ្តុះបណ្តាលមានតួនាទីជាសេនាធិការលើការងារបណ្តុះបណ្តាល ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	អនុវត្តផែនការអភិវឌ្ឍន៍សមត្ថភាពរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	សម្របសម្រួលជាមួយសាស្ត្រាចារ្យ គ្រូបណ្តុះបណ្តាល និងវាគ្មិនដទៃទៀត<br>
&ensp;&ensp;-	ការងារចាត់បញ្ជូនមន្ត្រីចូលរួមការអភិវឌ្ឍសមត្ថភាពនៅក្នុងនិងក្រៅប្រទេស ក្នុងក្របខណ្ឌនៃសមត្ថកិច្ចរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	គ្រប់គ្រងការងារពាក់ព័ន្ធសិក្ខាកាម សិស្ស និស្សិត<br>
&ensp;&ensp;-	រៀបចំវិញ្ញាបនបត្របញ្ជាក់ការសិក្សា និងឬ សញ្ញាបត្រ ជូនសិក្ខាកាម និងឬ សិស្ស និស្សិត<br>
&ensp;&ensp;-	ពិនិត្យ វាយតម្លៃ និងចេញលិខិតបញ្ជាក់ការសិក្សាជូនមន្ត្រីរាជការស៊ីវិលនៅទីស្តីការក្រសួងមហាផ្ទៃ និងនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	សិក្សាស្រាវជ្រាវវិធីសាស្ត្រអភិវឌ្ឍន៍សមត្ថភាព<br>
&ensp;&ensp;-	ចងក្រងឯកសារពាក់ព័ន្ធការបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	រៀបចំ និងគ្រប់គ្រងទិន្នន័យអភិវឌ្ឍន៍សមត្ថភាព<br>
&ensp;&ensp;-	គ្រប់គ្រងសម្ភារឧបទេស និងបរិក្ខារសម្រាប់ការបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	តាមដាន គាំទ្រ និងផ្តល់អន្តរាគមន៍អភិវឌ្ឍន៍សមត្ថភាពដល់រដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	តាមដានត្រួតពិនិត្យ វាយតម្លៃ និងគាំទ្រការអភិវឌ្ឍសមត្ថភាពនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
<strong>៣.នាយកដ្ឋានផែនការ និងកិច្ចសហប្រតិបត្តិការ មានតួនាទីជាសេនាធិការលើការងារផែនការ យុទ្ធសាស្ត្រ និងកិច្ចសហប្រតិបត្តិការ ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;- រៀបចំផែនការយុទ្ធសាស្ត្ររយៈពេលមធ្យម និងវែងរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- រៀបចំផែនការសកម្មភាព និងថវិកាប្រចាំឆ្នាំរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ​​រៀបចំ និងអភិវឌ្ឍ​​យុទ្ធសាស្ត្រ​ កម្មវិធីសិក្សា និងកម្ម​​វិធី​​នានា​របស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ​ការងាររៀបចំ និងគ្រប់គ្រងគម្រោង<br>
&ensp;&ensp;- រៀបចំយុទ្ធសាស្រ្តនៃការប្រាស្រ័យទាក់ទង<br>
&ensp;&ensp;- សម្របសម្រួល និងស្វែងរកកិច្ចសហការជាមួយក្រសួង ស្ថាប័ន គ្រឹះស្ថានសិក្សា និងអ្នកពាក់ព័ន្ធនានាទាំងក្នុងនិងក្រៅប្រទេសលើការងារទស្សនកិច្ចសិក្សា កម្មវិធីផ្លាស់ប្តូរ កម្មសិក្សា សកម្មភាពសង្គម និងសកម្មភាពផ្សេងៗទៀត <br>
&ensp;&ensp;- តាមដានត្រួតពិនិត្យ និងវាយតម្លៃការអនុវត្តផែនការរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- រៀបចំរបាយការណ៍បូកសរុបលទ្ធផលការងារ និងទិសដៅបន្តរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;- ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។ <br>
<strong>៤.នាយកដ្ឋានស្រាវជ្រាវ និងផ្សព្វផ្សាយ មានតួនាទីជាសេនាធិការលើការងារស្រាវជ្រាវ និងផ្សព្វផ្សាយ ដែលមានភារកិច្ចដូចខាងក្រោម៖</strong><br>
&ensp;&ensp;-	ផ្តួចផ្តើមរៀបចំ ចងក្រង និងផ្សព្វផ្សាយគោលនយោបាយ និងលិខិតបទដ្ឋានគតិយុត្តពាក់ព័ន្ធការអភិវឌ្ឍសមត្ថភាព និងអភិបាលកិច្ច<br>
&ensp;&ensp;-	ស្រាវជ្រាវ និពន្ធ ចងក្រង និងផ្សព្វផ្សាយឯកសារ សៀវភៅពាក់ព័ន្ធអភិបាលកិច្ច ការអភិវឌ្ឍមូលដ្ឋាន ការលើកកម្ពស់ស្វ័យភាពមូលដ្ឋាន និងការគ្រប់គ្រងរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	រៀបចំ និងចងក្រងករណីសិក្សាបម្រើឱ្យការងារបណ្តុះបណ្តាល<br>
&ensp;&ensp;-	តាមដាន វាយតម្លៃ និងលើកអនុសាសន៍ពាក់ព័ន្ធប្រព័ន្ធ ប្រសិទ្ធភាព និងគុណភាពនៃការអភិវឌ្ឍសមត្ថភាពនៅសាលាជាតិរដ្ឋបាលមូលដ្ឋាន និងនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ<br>
&ensp;&ensp;-	តាមដាន វាយតម្លៃ និងលើកអនុសាសន៍ពាក់ព័ន្ធការអនុវត្តច្បាប់ លិខិតបទដ្ឋានគតិយុត្ដ និងគោលនយោបាយពាក់ព័ន្ធ<br>
&ensp;&ensp;-	គ្រប់គ្រង និងធ្វើបច្ចុប្បន្នភាពគេហទំព័រ និងមធ្យោបាយទំនាក់ទំនងសង្គមរបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន <br>
&ensp;&ensp;-	គ្រប់គ្រង និងគាំទ្រការងារព័ត៌មានវិទ្យារបស់សាលាជាតិរដ្ឋបាលមូលដ្ឋាន<br>
&ensp;&ensp;-	ការងារគ្រប់គ្រងបណ្ណាល័យ និងបណ្ណសារដ្ឋាន <br>
&ensp;&ensp;-	ទទួលអនុវត្តភារកិច្ច និងសិទ្ធិផ្សេងៗទៀតដែលនាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋានប្រគល់ឱ្យ។<br>
        </div>
    </div>
</div>
@endsection