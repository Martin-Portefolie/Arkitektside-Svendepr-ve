<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Types\Types;
use Doctrine\Persistence\ObjectManager;

class ProjectsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $projectsData = [
            [
                "title" => "Rekt projektet",
                "place" => "Zürich",
                "country" => "Schweiz",
                "text" => "I en kommune i Zürich, bedre kendt for sin industrie og sine indkøbsmuligheder, har Dan Verbaum skabt en oase, der har taget afsæt i det allerede eksisterende hus, som skulle bibeholdes men bygges ud. 
                Parametrene for design var bestemt af ønsket om autonomi i form og væsentlighed, samt den nye bygning samspil med huset og pool som allerede var der. En eksisterende pavillon, der fungerer som pool og sommerhuset, blev revet ned og erstattet af en ny og mere volumiøs. 
                Den nye bygning der har form som i sig selv er svar på sin holdning til stedet, og dens vinklede facader afspejler kundens ønske om leve områder, der tilbyder forskellige grader af åbenhed og afsondrethed. Det udvendige er konfronteret med horisontale, cedertræ lægte beklædning, hvilket yderligere understreger geometri af bygningen. 
                De tre etager samlede volumen er 1, 000 m³. Garage og nødvendig opbevaring, og nytte værelser er beliggende i kælderen. Det åbne-plan i stueetagen består af en stor opholdsstue, spise og madlavning område, og der er tre soveværelser og en forsænket balkon på øverste etage. 
                Interiøret, også designet af Dan Verbaum, er defineret ved dets kerne står i kastanietræ, som omfatter i forhallen, med garderobe og eksternt tilgængelige gæstetoilet, og trappe. 
                Bygningen er Minergie ® certificeret, et registreret kvalitetsmærke for lavenergibygninger. Det omfatter at gøre brug af de tilstødende huses eksisterende varmeanlæg og ved hjælp af solpaneler lave opvarmning af vand til begge huse. 
                ",
                "photos" => ['rekt1.jpg', 'rekt2.jpg', 'rekt3.jpg', 'rekt4.jpg', 'rekt5.jpg', 'rekt6.jpg', 'rekt7.jpg',]
            ],
            [
                "title" => "Curve projektet",
                "place" => null,
                "country" => "Den dominikanske Republik",
                "text" => "Det positive klima, der hersker i løbet af hele året på den caribiske ø, samt placeringen af grunden ved de 7,000 kvm sandstrand ved kysten, bestemte mere eller mindre på forhånd visse aspekter i Curve projektets design, mindes John P. Herluf som er arkitekten bag Curve projektet
                Med en enestående arkitektonisk idé og et vist niveau af risikable designideer satte John P. Herluf sig til tegnebordet og lavede dette smukke udkast, som bygherre straks godkendte og i løbet af forbavsende kort tid påbegyndte. 
                Huset er beklædt med en naturligt forekommende sten af Coralline, der har klare toner (hvid - beige), som har den rette kvalitet til at bygge i, så det automatisk giver et visuelt aspekt, som trives med den rigelige sol lys, og den maritime reference.
                Fra den primære adgang, synes huset for at skjule sig bag en virkeliggørelsen af buede vægge, der giver et helt skulpturelt islæt. I midten, fører en stor dør af rektanklet træ ind i huset. Hele boligen har på grund af formerne naturlig ventilation, så huset på denne måde at kunne gøre brug af alle fordelene ved det caribiske klima især brisen fra havet.
                ",
                "photos" => ['curve1.jpg','curve2.jpg','curve3.jpg','curve4.jpg','curve5.jpg','curve6.jpg','curve7.jpg']

            ],
            [
                "title" => "Brohuset",
                "place" => "Århus",
                "country" => "Danmark",
                "text" => "Baggrund 
                Klienterne bad Niels Hoy Hansen om at tegne en fast bolig med kontor på deres lille ejendom, som ligger en times kørsel fra Adelaide, Australien. Et knæk i Wintercreek åen, der deler ejendommen, skaber en billabong (et dybt vandhul), der afgrænses af en høj klippe-skænt. Der blev bedt om et hus, der ville kunne ”påskønne” grunden uden at ødelægge dens skønhed, men på et økonomisk leje som kan sammenlignes med en præfabrikeret bolig.
                Designet: Et smalt hus form, strækker sig over åen. Vinduer på hver side åbner huset i begge retninger, hvilket giver følelsen af at leve mellem træerne. 
                Struktur og Materialer: To stålspær udgør den primære struktur, blev fabrikeret off-site og rejst af to mænd og en kran på to dage. De blev forankret i fire små beton støtter.  Et betongulv spænder sig ud mellem de 2 stålspær, kassen med vægelementer og tagdækning er lavet af plantage fyrretræ. 
                ",
                "photos" => ['brohus1.jpg','brohus2.jpg','brohus3.jpg','brohus4.jpg','brohus5.jpg','brohus6.jpg','brohus7.jpg', 'brohus8.jpg']

            ],
            [
                "title" => "Kasse projektet",
                "place" => "Ordos plateau ",
                "country" => "Mongoliet",
                "text" => "SITUATIONEN
                Landskabet i Ordos plateau i Indre Mongoliet, er bredt og åbent, præget af klitter af sand og lav vegetation. Klimaet er stabilt og tørt, med kun 200-450 mm årlige nedbør, hvilket har gjort udkomme i området til en stor udfordring gennem århundreder. I dag er landet stadig truet af tørke, erosion af jord og ørkendannelse. Tab af jord til ørken er lig 3,600 m2 pr. år
                PROJEKTET I vores projekt har vi fokuseret på disse miljømæssige faktorer og forsøgte at skabe et mikrokosmos i vort hus, med modsatte forhold fra situationen på ydersiden, som en oase i Ordos ørkenen.
                Væggen fungerer som en vind barriere, for at skabe et godt mikroklima for indbyggerne i bygningen og tage sig af vertikal og horisontal bevægelse gennem bygningen. Muren omgiver en indre gård med 3 etager over jorden og 1. etage nedenfor.
                Kasserne fungerer som beholder til at leve, spise, sove og lave fritidsaktiviteter, samt kvarterer for arbejde. Som beholdere er kasserne er placeret i en lodret rækkefølge i forhold til behovet for dagslys og privatlivets fred. Fritidsaktiviteter er således placeret i underetagen, entré og arbejdsrum er i stueetagen, det levende-/ spisestue-værelse er på 1. sal og soveværelserne er placeret på øverste etage, og giver så meget privatliv som muligt inden for bygningen. Kasserne er placeret vandret for at danne et dynamisk forhold til hinanden. Funktioner, der kræver en god strøm af bevægelse mellem hinanden slutter i midten, danner rum, der åbner op i alle fire retninger. Adskilte funktioner som soveværelser er dannet som uafhængige enheder.
                Sammen udgør disse rumlige systemer en lille tre-dimensionel landsby, med en logisk omsætning af struktur
                 ",
                "photos" => ['ks1.jpg', 'ks2.jpg', 'ks3.jpg', 'ks4.jpg', 'ks5.jpg']

            ],
            [
                "title" => "Softline projektet",
                "place" => null,
                "country" => null,
                "text" => "The West Side Soft Line Park i New York City er en kontinuerlig stigende form for brostruktur, der i løbet af de næste ti år bliver en unik lineær bypark. Designet af Design Architects, vil Soft Line Park fremme en fusion mellem forskellige af bydelens økologier både funderede og implanterede. 
                 Det er her, at Design Architects er blevet bestilt af bygherren Alvin Naltman til at designe en slim-fit, 14 etagers bygning. I stueetagen er der gallerier og ´på etagerne ovenover fordeler 12 ejerlejligheder sig. 
                Det har været vigtigt for så vel Design Architects som for bygherre at designet ikke blev med for skarpe kanter, da man gerne vil sigte efter et mere organisk visuelt indtryk. Dog skulle man imødegå tidens trend uden at blive for minimalistisk i tanke. Respekten for det allerede eksisterende, samt de planer der i fremtiden er for området, skulle også imødegås og var noget af en udfordring, som begge parter dog menerer løst på bedste og 
                ",
                "photos" => ['sl1.jpg', 'sl2.jpg', 'sl3.jpg', 'sl4.jpg', 'sl5.jpg']

            ],
        ];

        foreach ($projectsData as $data) {
            $project = new Projects();
            $project->setTitle($data['title']);
            $project->setPlace($data['place']);
            $project->setCountry($data['country']);
            $project->setText($data['text']);
        
            // Check if photos is a single element array with comma separated values.
            if (count($data['photos']) === 1 && strpos($data['photos'][0], ',') !== false) {
                $photos = explode(', ', $data['photos'][0]);
            } else {
                $photos = $data['photos'];
            }
            
            $project->setPhotos($photos);
        
            $manager->persist($project);
        }
        
        $manager->flush();
    }
}