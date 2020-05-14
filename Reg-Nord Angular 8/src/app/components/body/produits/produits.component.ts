import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-produits',
  templateUrl: './produits.component.html',
  styleUrls: ['./produits.component.css']
})
export class ProduitsComponent implements OnInit {

  pressionCategories = [
        { designation: 'Pression différentielle' },
        { designation: 'Pression relative' },
        { designation: 'Pression absolue' },
        { designation: 'Pression multivariable' },
    ];

  vanneCategories = [
    { designation: 'Vanne à segment' },
    { designation: 'Vanne papillon' },
    { designation: 'Vanne à obturateur' },
    { designation: 'Vanne rotative' },
    { designation: 'Positionneur' },
    { designation: 'Valve' },
  ];

  debitCategories = [
    { designation: 'Vanne à segment' },
    { designation: 'Vanne papillion' },
  ];

  niveauCategories = [
    { designation: 'Vanne à segment' },
    { designation: 'Vanne papillion' },
  ];

  temperatureCategories = [
    { designation: 'Sonde de température' },
    { designation: 'Convertisseur' },
    { designation: 'Transmetteur' },
  ];
  regulateurCategories = [
    { designation: 'Vanne à segment' },
    { designation: 'Vanne papillion' },
  ];
  enregistreurCategories = [
    { designation: 'Enregistreur avec papier' },
    { designation: 'Enregistreur sans papier' },
  ];
  analyseurCategories = [
    { designation: 'Vanne à segment' },
    { designation: 'Vanne papillion' },
  ];
  positionneurCategories = [
    { designation: 'ABB' },
    { designation: 'Metso' },
  ];

  categories = [];
  produits = []; // les produits que l'on affiche
  allProducts = []; // tous les produits de la catégorie selectionnée

  basePath = '../../../../assets/Images/Produits/';

  prodvanCategories = [
    {
      type: 'Vanne à segment',
      soustype: 'metso',
      titrecard: 'Vanne V-port RA',
      reference: '',
      photo: 'squ-segment-ra.png',
      doctechn: 'serie-ra3r21fr.pdf',
      id: 'vportRA',
      descriptif: 'Les vannes Neles V-port série RA de Metso sont\n' +
        'des vannes à segment sphérique essentiellement destinées à la régulation, mais également utilisables en sectionnement',
    },
    {
      type: 'Vanne à segment',
      soustype: 'metso',
      titrecard: 'Vanne V-port RE',
      reference: '',
      photo: 'squ-segment-re.png',
      doctechn: 'serie-re3r24fr.pdf',
      id: 'vportRE',
      descriptif: 'Les vannes de la série Neles RE de Metso sont\n' +
        'des vannes de régulation à segment sphérique hautes performances et économiques',
    },
    {
      type: 'Vanne à obturateur',
      soustype: 'metso',
      titrecard: 'Vanne finetrol à obturateur exentré FC',
      reference: '',
      photo: 'squ-finetrol-fc.png',
      doctechn: 'finetrol-fc5ft20fr.pdf',
      id: 'finetrolFC',
      descriptif: 'Les vannes Finetrol à obturateur excentré sont des vannes de régulation haute\n' +
        'performance et économiques. Elles sont conçues pour apporter la plus grande précision de régulation ainsi qu\'une\n' +
        'grande rangeabilité tout en conservant tous les avantages des vannes de régulation rotatives',
    },
    {
      type: 'Vanne papillon',
      soustype: 'metso',
      titrecard: 'Vanne papillon Neldisc à triple excentration L12',
      reference: '',
      photo: 'squ-neldisc-l12.png',
      doctechn: 'neldisc-l122l1220fr.pdf',
      id: 'neldiscL12',
      descriptif: 'Les vannes Neldisc de Metso Série L12 sont des vannes à disque excentré à siège\n' +
        'métallique de haute performance, économique grâce a leur conception monobloc et non démontable\n' +
        'Elles se distinguent par une caractéristique égal pourcentage dans les deux sens et une très grande étanchéité\n' +
        'Elles sont utilisées aussi bien en régulation qu\'en sectionnement',
    },
    {
      type: 'Vanne rotative',
      soustype: 'metso',
      titrecard: 'Vanne rotative neles ROTARYGLOBE ZX',
      reference: '',
      photo: 'min-rotarygloble-zx.png',
      doctechn: 'rotaryglobe-zx1rg20fr.pdf',
      id: 'rotaZX',
      descriptif: 'La vanne Neles RotaryGlobe de Metso est conçue pour la régulation du débit d’\ une large gamme\n' +
        'de liquides, gaz et vapeurs .Sa fiabilité et sa robustesse ainsi que la diversité des obturateurs disponibles\n' +
        'en font le choix idéal pour les applications de régulation normales, difficiles et même évères d’\ une grande\n' +
        'variété d’\industries. Elle assure une excellente précision de régulation et possède les avantages caractéristiques\n' +
        'des vannes rotatives.',
    },
    {
      type: 'Valve',
      soustype: 'metso',
      titrecard: 'Controleur numérique VALVGUARD',
      reference: '',
      photo: 'squ-valvguardvg9.png',
      doctechn: 'controleur-valvguard9vg921fr.pdf',
      id: 'VALVGUARD',
      descriptif: 'Le Neles ValvGuard VG9000 de Metso est une électrovanne de sécurité intelligente de nouvelle génération intégrant\n' +
        'des fonctions de test à course partielle. Il peut être utilisé aussi bien avec des vannes d’arrêt d’urgence(ESD) que\n' +
        'des vannes d’aération d’urgence(ESV). Ses fonctions et caractéristiques, exclusives et avancées, sont spécialement conçues\n' +
        'pour les applications sécuritaires',
    },
  ];

  prodpressCategories = [
    {
      type: 'Préssion',
      soustype: 'abb',
      titrecard: '',
      reference: '',
      photo: '',
      doctechn: '',
      id: '',
      descriptif: '',
    },
    {
      type: 'Préssion',
      soustype: 'abb',
      titrecard: '',
      reference: '',
      photo: '.PNG',
      doctechn: '.pdf',
      id: '',
      descriptif: '',
    },
  ];

  prodposiCategories = [
    {
      type: 'Positionneur',
      soustype: 'abb',
      titrecard: 'Positionneur TZIDC',
      reference: 'TZIDC',
      photo: 'TZIDC.PNG',
      doctechn: '10_18_022_FR_K.pdf',
      id: 'TZIDC',
      descriptif: 'Le TZIDC est un positionneur électroniquement paramétrable et communicant à monter au sein\n' +
        'd\'entraînements pneumatiques linéaires et pivotants. Il se caractérise par sa construction compacte et\n' +
        'de petite taille, sa structure modulaire et un excellent rapport prix / performances. L\'adaptation à\n' +
        'l\'appareil de réglage et la détermination des paramètres de réglage s\'effectue de manière entièrement\n' +
        'automatique, ce qui permet d\'économiser un maximum de temps et d\'obtenir un comportement de réglage optimal. ',
    },
    {
      type: 'Préssion',
      soustype: 'abb',
      titrecard: 'Positionneur EDP300',
      reference: 'EDP300',
      photo: 'EDP300.PNG',
      doctechn: 'DS_EDP300_FR_D01.pdf',
      id: 'EDP300',
      descriptif: 'Le PositionMaster EDP300 est un positionneur électroniquement paramétrable et communicant à monter sur\n' +
        'des entraînements pneumatiques linéaires et pivotants. Il se caractérise par sa construction compacte de taille\n' +
        'réduite, sa structure modulaire et un excellent rapport prix / performances. L\'adaptation à l\'appareil de réglage\n' +
        'et la détermination des paramètres de réglage s\'effectue de manière entièrement automatique, ce qui permet d\'économiser\n' +
        'un maximum de temps et d\'obtenir un comportement de réglage optimal.',
    },
    {
      type: 'Positionneur',
      soustype: 'metso',
      titrecard: 'Positionneur neles ND 9000',
      reference: '',
      photo: 'squ-positionneur-nd9000.png',
      doctechn: 'positionneur-nd90007nd9021fr.pdf',
      id: 'ND9000',
      descriptif: 'Le Neles ND9000 est un contrôleur de position de vanne intelligent de grande qualité conçu pour\n' +
        'fonctionner sur n’importe quel actionneur de vanne et dans tous les secteurs industriels. Il garantit la qualité\n' +
        'du produit final dans toutes les conditions opérationnelles grâce à une fonction de diagnostic unique en\n' +
        'son genre et des caractéristiques de performances incomparables',
    },
    {
      type: 'Positionneur',
      soustype: 'metso',
      titrecard: 'Positionneur neles NDX',
      reference: '',
      photo: 'squ-positionneur-ndx.png',
      doctechn: 'positionneur-ndx7ndx21en.pdf',
      id: 'NDX',
      descriptif: 'Le Neles NDX est le nouveau contrôleur de position de vanne intelligent de Metso, conçu pour fonctionner\n' +
        'avec toutes les marques de vannes et d\'actionneurs sur le marché. Il garantit la qualité du produit final dans toutes\n' +
        'les conditions opérationnelles grâce à une fonction de diagnostic unique en son genre et des caractéristiques de\n' +
        ' performances incomparables.',
    },
  ];

  prodvdebCategories = [

  ];

  prodnivCategories = [

  ];

  prodtempCategories = [
    {
      type: 'Température',
      soustype: 'abb',
      titrecard: 'Sonde TSC400',
      reference: 'TSC400',
      photo: 'TSC400.PNG',
      doctechn: 'DS_TSC400_FR_B.pdf',
      id: 'TSC400',
      descriptif: '',
    },
    {
      type: 'Température',
      soustype: 'abb',
      titrecard: 'Sonde TSH200',
      reference: 'TSH200',
      photo: 'TSH200.PNG',
      doctechn: 'DS_TSH200_FR_A.pdf',
      id: 'TSH200',
      descriptif: '',
    },
    {
      type: 'Température',
      soustype: 'abb',
      titrecard: 'Sonde TSP1X1',
      reference: 'TSP1X1',
      photo: 'TSP1X1.PNG',
      doctechn: 'DS_TSP1X1_FR_E.pdf',
      id: 'TSP1X1',
      descriptif: '',
    },
    {
      type: 'Température',
      soustype: 'abb',
      titrecard: 'Sonde TSP3X1',
      reference: 'TSP3X1',
      photo: 'TSP3X1.PNG',
      doctechn: 'DS_TSP3X1_FR_E.pdf',
      id: 'TSP3X1',
      descriptif: '',
    },
    {
      type: 'Convertisseur',
      soustype: 'abb',
      titrecard: 'Convertisseur TTF300',
      reference: 'TTF300',
      photo: 'TTF300.PNG',
      doctechn: 'DS_TTF300_FR_F.pdf',
      id: 'TTF300',
      descriptif: 'Convertisseur de mesure de température pour tous les protocoles de communication. Redondance par deux entrées',
    },
    {
      type: 'Transmetteur',
      soustype: 'abb',
      titrecard: 'Transmetteur TTH300',
      reference: 'TTH300',
      photo: 'TTH300.PNG',
      doctechn: 'DS_TTH300_FR_E01.pdf',
      id: 'TTH300',
      descriptif: 'Convertisseur de mesure de température pour tous les protocoles de communication. Redondance par deux entrées',
    },
    {
      type: 'Transmetteur',
      soustype: 'abb',
      titrecard: 'Transmetteur TTR200',
      reference: 'TTR200',
      photo: 'TTR200.PNG',
      doctechn: 'DS_TTR200_FR_D.pdf',
      id: 'TTR200',
      descriptif: 'Transmetteur de température pour le protocole HART. Pour toutes les exigences standards',
    },
  ];

  prodregCategories = [

  ];

  prodenrCategories = [
    {
      type: 'Enregistreur avec papier',
      soustype: 'abb',
      titrecard: 'Enregistreur/regulateur à diagramme circulaire',
      reference: 'C1900',
      photo: 'C1900.PNG',
      doctechn: 'DS_C1900RC-FR_AC.pdf',
      id: 'C1900',
      descriptif: 'Le C1900 est un enregistreur / régulateur à diagramme circulaire entièrement programmable associant deux\n' +
        'boucles de régulation PID et 4 plumes d’enregistrement. Les commandes opérateurs simplifiées du C1900 et sa construction\n' +
        'robuste le destinent à divers environnements industriels. Ses excellentes fonctions standard sont complétées par une\n' +
        'gamme étendue d’options garantissant toute la souplesse d’adaptation à votre application. ',
    },
    {
      type: 'Enregistreur sans papier',
      soustype: 'abb',
      titrecard: 'Enregistreur sans papier RVG200',
      reference: 'RVG200',
      photo: 'RVG200.PNG',
      doctechn: 'DS_RVG200-FR_I.pdf',
      id: 'RVG200',
      descriptif: 'Le ScreenMaster RVG200 est un enregistreur sûr, facile à utiliser et sans papier. Un maximum de 24\n' +
        'signaux de procédé peut être directement connecté aux entrées analogiques du RVG200 ou y être transféré par communication\n' +
        'numérique. Toutes les données de procédé, y compris les statuts d’alarme, les résultats de calculs mathématiques et\n' +
        'les valeurs du totalisateur sont affichées clairement pour l’opérateur et archivées en toute sécurité dans un format crypté,\n' +
        'consultables à l’aide du logiciel inclus DataManager Pro pour PC.',
    },
    {
      type: 'Enregistreur sans papier',
      soustype: 'abb',
      titrecard: 'Enregistreur sans papier SM500F',
      reference: 'SM500F',
      photo: 'SM500F.PNG',
      doctechn: 'DS_SM500F-FR_AH.pdf',
      id: 'SM500F',
      descriptif: 'Le SM500F est un enregistreur sans papier installable sur le lieu de mise en œuvre du procédé. La\n' +
        'conception unique du boîtier permet une installation murale, sur tuyauterie ou sur panneau. Les données de procédé\n' +
        'sont affichées clairement, et l\'opérateur local bénéficie de divers formats d\'affichage, notamment des diagrammes,\n' +
        'des histogrammes et des affichages par indicateur numérique. De plus, les données de procédé sont transférées de\n' +
        'manière sécurisée à la carte mémoire amovible. Les communications Ethernet assurent un contrôle distant pratique\n' +
        'du procédé et un accès aux données consignées.'
    },
  ];

  prodanalCategories = [

  ];




  constructor(
    private activatedRoute: ActivatedRoute
  ) { }

  ngOnInit() {
    // Récupération des paramètres
    this.activatedRoute.queryParams.subscribe(
      param => {
        /*console.log(param);*/
        switch (param.type) {
          case 'pression':
            this.categories = this.pressionCategories;
            this.produits = this.prodpressCategories;
            this.allProducts = this.prodpressCategories;
            break;

          case 'vanne':
            this.categories = this.vanneCategories;
            this.produits = this.prodvanCategories;
            this.allProducts = this.prodvanCategories;
            break;

          case 'debit':
            this.categories = this.debitCategories;
            this.produits = this.prodvdebCategories;
            this.allProducts = this.prodvdebCategories;
            break;

          case 'niveau':
            this.categories = this.niveauCategories;
            this.produits = this.prodnivCategories;
            this.allProducts = this.prodnivCategories;
            break;

          case 'temperature':
            this.categories = this.temperatureCategories;
            this.produits = this.prodtempCategories;
            this.allProducts = this.prodtempCategories;
            break;

          case 'regulateur':
            this.categories = this.regulateurCategories;
            this.produits = this.prodregCategories;
            this.allProducts = this.prodregCategories;
            break;

          case 'enregistreur':
            this.categories = this.enregistreurCategories;
            this.produits = this.prodenrCategories;
            this.allProducts = this.prodenrCategories;
            break;

          case 'analyseur':
            this.categories = this.analyseurCategories;
            this.produits = this.prodanalCategories;
            this.allProducts = this.prodanalCategories;
            break;
          case 'positionneur':
            this.categories = this.positionneurCategories;
            this.produits = this.prodposiCategories;
            this.allProducts = this.prodposiCategories;
            break;

          default:
            break;
        }
      }
    );
  }

  // Filtre en fonction des catégories selectionnées
  filtrer(form: any) {
    // On détecte les catégories cochées
    const selectedCategories = [];
    Object.keys(form.value).forEach(key => {
      if (form.value[key]) {
        selectedCategories.push(key);
      }
    });

    console.log(selectedCategories);

    if (selectedCategories.length > 0) {
      // On parcourt les produits selectionnés et on ne prends que ceux qui ont une catégorie cochée
      this.produits = [];
      this.allProducts.forEach(product => {
        if (selectedCategories.indexOf(product.type) >= 0) {
          this.produits.push(product);
        }
      });

    } else {
      // On remet tous les produits
      this.produits = this.allProducts;
    }
  }
}
