import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  // Variables
  urlgal = 'galerie';
  compoNavbar = [
    {
      designation: 'Produits',
      url: 'produits',
      liens: [
        { designation: 'Pression', param: { type: 'pression' } },
        { designation: 'Débit', param: { type: 'debit' } },
        { designation: 'Niveau', param: { type: 'niveau' } },
        { designation: 'Température', param: { type: 'temperature' } },
        { designation: 'Régulateur', param: { type: 'regulateur' } },
        { designation: 'Enregisteur', param: { type: 'enregistreur' } },
        { designation: 'Vanne', param: { type: 'vanne' } },
        { designation: 'Analyseur', param: { type: 'analyseur' } },
        { designation: 'Positionneur', param: { type: 'positionneur' } },
      ]
    },
    {
      designation: 'Marques',
      url: 'marques',
      liens: [
        { designation: 'ABB', param: { type: 'abb' } },
        { designation: 'Metso', param: { type: 'metso' } },
        { designation: 'West', param: { type: 'west' } },
        { designation: 'CD automation', param: { type: 'cdautomation' } },
        { designation: 'Flow-mon', param: { type: 'flowmon' } },
      ]
    },
    {
      designation: 'Services',
      menu: [
        { designation: 'ABB' },
        { designation: 'Metso' },
        { designation: 'West' },
        { designation: 'CD automation' },
        { designation: 'Flow-mon' },
      ]
    },
    {
      designation: 'Outils',
      url: 'outils',
      liens: [
        { designation: 'ABB' },
        { designation: 'Metso' },
        { designation: 'West' },
        { designation: 'CD automation' },
        { designation: 'Flow-mon' },
      ]
    },
  ];


  constructor(
    private router: Router
  ) { }

  ngOnInit() {
  }
  // Redirection
  redirectionacc() {
    this.router.navigate(['acceuil']);
  }
  redirectiongal() {
    this.router.navigate(['galerie']);
  }
}
