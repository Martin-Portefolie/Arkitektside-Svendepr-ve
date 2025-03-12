<?php
namespace App\DataFixtures;

use App\Entity\News;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $newsData = [
            [
                "title" => "PARTNER I DESIGN ARCHITECTS, DAN VERBAUM SOM JURY",
                "description" => "Dan Verbaum er af The sixt European Biennial of Landscape Architecture of Barcelona blevet inviteret som medlem af den Internationale Jury, som skal vælge finalister til den prestigefyldte Rosa Barba Price. Den 6. udgave af biennalen foregår i Barcelona først i februar 2023.",
                "projects" => []
            ],
            [
                "title" => "INVITERET TIL GENNEMGANG AF KONKURRENCE I RIBE",
                "description" => "Design Architects er inviteret til deltagelse i gennemgang af projektkonkurrencen om Ribe Domkirkeplads. Projektkonkurrencen og det efterfølgende projekt blev udviklet og gennemført i et partnerskab mellem Esbjerg Kommune og Realdania. Klik her: https://realdania.dk/projekter/ribe-domkirkeplads.",
                "projects" => [
                    [
                        "title" => "Ribe Domkirkeplads Projekt",
                        "description" => "Design Architects er inviteret til deltagelse i projektkonkurrencen om Ribe 
                        Domkirkeplads. Projektkonkurrencen og det efterfølgende projekt udvikles og gennemføres i 
                        et partnerskab mellem Esbjerg Kommune og Realdania.
                        Den historiske bykerne i Ribe med domkirken som monumentalt midtpunkt hører til blandt Danmarks bedst bevarede historiske kulturmiljøer. Den omgivende plads omkring domkirken er dog mærket af bilismens krav og fortidens bearbejdning og fremstår som en uværdig ramme for det historiske monument. Projektet skal råde bod på dette og bidrage til en revitalisering af pladsen. 
                        Vision 
                        Sammen med Realdania vil Esbjerg Kommune omskabe pladsen omkring Ribe Domkirke til et aktivt byrum – et byrum, der både kan matche og spille sammen med domkirken, et af Ribes mest markante vartegn. 
                        Projekt 
                        Gadenettet omkring Ribe Domkirke i Ribes bymidte er stort set uændret siden middelalderen, og mange af byens historiske huse og anlæg er fint bevaret. Selve domkirkepladsen lider derimod under bilernes indtog og er nærmest ”sunket” i jorden, efterhånden som byen er vokset op omkring kirken. Esbjerg Kommune har allerede igangsat en trafiksaneringsplan. Samtidig har kommunen i samarbejde med Realdania fået udarbejdet en byrumsanalyse, der afdækker domkirkepladsens betydning og fremtidige udvikling. 
                        På denne baggrund indgår Esbjerg Kommune og Realdania nu en partnerskabsaftale med den fælles vision at omskabe domkirkepladsen til en værdig og stilfuld ramme om Ribe Domkirke og til et aktivt byrum til glæde og gavn for byens borgere og turister. Pladsen skal opleves som et ikon, der fortæller sin historie på tværs af tid i samspil med domkirken og den omkringliggende historiske bykerne. ",
                        "image" => "ribeprojektet.png"
                    ]
                ]
            ],
            [
                "title" => "URBAN MEDIASPACE PÅ ÅRHUS HAVN ER IGANG",
                "description" => "Design Architects er sammen med det øvrige rådgiverteam fuldt igang med indretningsfasen og udvidet dispositionsforslag forventes færdigt ultimo februar 2023.",
                "projects" => []
            ],
            [
                "title" => "CAMPUS I STRUER",
                "description" => "De nye campus arealer ved Struer Gymnasium og Struer Museum tog form helt tilbage i 2010. Udearealerne stod færdige i foråret 2012, og nu kigger vi tilbage mod projektets mål og målopfyldelse. Klik her for at se Realdanias formulering af projektet.",
                "projects" => [
                    [
                        "title" => "Campus-projektet",
                        "description" => "Projektet Campus Struer ønsker at skabe et fysisk rum for fælles oplevelser, kreativitet
                        og samarbejde. I bogstavligste forstand har de tre institutioner Struer Museum, Struer
                        Gymnasium og Struer erhvervsskole vendt ryggen til hinanden. I området gemmer sig
                        imidlertid en kulturhistorisk perle, Johannes Buchholtz´hus. Projektet Campus Struer handler
                        derfor om at:
                        1/ vende vrangen ud - at definere et nyt fælles sted og rum for de tre institutioner.
                        2/ skabe tilgængelighed - at etablere trapper og ramper, så tilgængeligheden internt
                        øges og skabe mulighed for at rummet kan fungere som en short cut i det almindelige
                        byflow.
                        3/ skabe steder - en campus er en ramme for det uformelle møde og den spontane
                        samtale på vejen.
                        Design Architects har givet et bud på, hvordan det kan se ud.
                        ",
                        "image" => "campusprojektet.png"
                    ]
                ]
            ],
            [
                "title" => "INDBUDT TIL KONKURRENCE OM BÜLOWS PLADS",
                "description" => "Design Architects er indbudt til konkurrencen om retablering af den historiske Bülows Plads i Fredericia. Formålet med projektkonkurrencen er at skabe en værdig ramme for pladsens historiske bygninger med fokus på den særlige atmosfære og historiske begivenheder, som pladsen i generationer har lagt rum til.",
                "projects" => []
            ],
            [
                "title" => "DESIGN ARCHITECTS PRÆKVALIFICERET TIL ALMENBOLIG",
                "description" => "Design Architects er udvalgt til at deltage i konkurrence om ALMENBOLIG+ for KAB. Virksomheden skal samarbejde med De Meeuw Oirschot b.v, Cubo Arkitekter og COWI om at udvikle op til 800 boliger.",
                "projects" => []
            ]
        ];

        foreach ($newsData as $data) {
            $news = new News();
            $news->setTitle($data['title']);
            $news->setDescription($data['description']);

            $manager->persist($news);

            // If there are projects for this news item, create and associate them
            foreach ($data['projects'] as $projectData) {
                $project = new Project();
                $project->setTitle($projectData['title']);
                $project->setDescription($projectData['description']);
                $project->setImage($projectData['image']);
                $project->setNews($news);

                $manager->persist($project);
            }
        }

        $manager->flush();
    }
}
