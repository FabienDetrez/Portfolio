import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-acceuil',
  templateUrl: './acceuil.component.html',
  styleUrls: ['./acceuil.component.css']
})
export class AcceuilComponent implements OnInit {


  // Variables
  basePathCarousel = '../../../../assets/Images/Carousel/';
  carousel1Images = [
    {
      name: 'Machine_papier.jpg', description: 'ABB et Metso Neles sont des acteurs de renom dans le monde\n' +
        'de l\'industrie Papetière. Nous disposons d\'une gamme complète en Mesure mais également Vanne de régulation\n' +
        'et de Sectionnement assurant des performances maximales. Avec un seul objectif d\'accroître l\'efficacité de votre process.'
    },
  ];
  carouselImages = [
    {
      name: 'Industrie_chimique.jpg', description: 'ABB et Metso Neles sont des acteurs de renom dans le monde\n' +
        'de l\'industrie Papetière. Nous disposons d\'une gamme complète en Mesure mais également Vanne de régulation\n' +
        'et de Sectionnement assurant des performances maximales. Avec un seul objectif d\'accroître l\'efficacité de votre process.'
    },
  ];

  basePathMarquee = '../../../../assets/Images/Marquee/';
  images = [
    { name: 'ABB-Bailey-1.png', link: '/marques', param: { type: 'abb' } },
    { name: 'metso_logo_rgb-edited.jpg', link: '/marques', param: { type: 'metso' } },
    { name: 'Flow-mon.JPG', link: '/marques', param: { type: 'flowmon' } },
    { name: 'cdautomation_400x400.jpg', link: '/marques', param: { type: 'cdautomation' } },
    { name: 'KTek.jpg', link: '/marques', param: { type: 'abb' } },
    { name: 'logo-abb1.jpg', link: '/marques', param: { type: 'abb' } },
    { name: 'TECO-Fischer-Porter-Logo.jpg', link: '/marques', param: { type: 'abb' } },
    { name: 'West Controls Solutions_554x350.jpg', link: '/marques', param: { type: 'west' } },
    { name: '61217.jpg', link: '/marques', param: { type: 'abb' } },
    { name: '61E1rwyEm-L._SX522_.jpg', link: '/marques', param: { type: 'abb' } },
    { name: 'hartmannbraun.PNG', link: '/marques', param: { type: 'abb' } },
    { name: 'Neles.jpg', link: '/marques', param: { type: 'metso' } },
    { name: 'Jamesburry.png', link: '/marques', param: { type: 'abb' } }
  ];



  constructor() { }

  ngOnInit() {
  }

}
