import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-galerie',
  templateUrl: './galerie.component.html',
  styleUrls: ['./galerie.component.css']
})
export class GalerieComponent implements OnInit {

  basePath = '../../../../assets/Images/Galerie/';
  images = [    {
      titre: '',
      photo: 'IMG_20191125_114954.jpg',
      descriptif: '',
    },
    {
      titre: '"Maxime qui "TRAVAIL"',
      photo: 'IMG_20191125_130344.jpg',
      descriptif: '',
    },
    {
      titre: '266DRH + S26RE PFA',
      photo: '266DRH + S26RE PFA.jpg',
      descriptif: '',
    },
    {
      titre: 'Boîtier Inox',
      photo: 'Boîtier Inox.jpg',
      descriptif: '',
    },
    {
      titre: 'Mesure de Débit par orage déprimogéne',
      photo: 'Mesure de Débit par orage déprimogéne.jpg',
      descriptif: '',
    },
    {
      titre: 'Montage Positionneur NDX sur Actionneur Amri KSB_1',
      photo: 'Montage Positionneur NDX sur Actionneur Amri KSB_1.jpg',
      descriptif: '',
    },
    {
      titre: 'Montage Positionneur NDX sur Actionneur Amri KSB_2',
      photo: 'Montage Positionneur NDX sur Actionneur Amri KSB_2.jpg',
      descriptif: '',
    },
    {
      titre: 'Organe déprimogène Monobloc',
      photo: 'Organe déprimogène Monobloc.jpg',
      descriptif: '',
    },
    {
      titre: 'Organe déprimogène_Montage à bride avec prise de température intégrée',
      photo: 'Organe déprimogène_Montage à bride avec prise de température intégrée.jpg',
      descriptif: '',
    },
    {
      titre: 'Séparateur INOX',
      photo: 'Séparateur INOX.jpg',
      descriptif: '',
    },
    {
      titre: 'Separateur PFA',
      photo: 'Separateur PFA_ABB.JPG',
      descriptif: '',
    },
    {
      titre: 'Transmetteur de Pression INOX avec Séparateur INOX',
      photo: 'Transmetteur de Pression INOX avec Séparateur INOX.jpg',
      descriptif: '',
    },
    {
      titre: 'Transmetteur de pression relative ABB boîtier INOX sur Séparateur DIAFLEX_1',
      photo: 'Transmetteur de pression relative ABB boîtier INOX sur Séparateur DIAFLEX_1.jpg',
      descriptif: '',
    },
    {
      titre: 'Transmetteur de pression relative ABB boîtier INOX sur Séparateur Diaflex_2',
      photo: 'Transmetteur de pression relative ABB boîtier INOX sur Séparateur Diaflex_2.jpg',
      descriptif: '',
    },
  ];

  constructor() { }

  ngOnInit() {
  }

}
