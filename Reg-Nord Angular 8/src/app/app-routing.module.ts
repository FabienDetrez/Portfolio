import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AcceuilComponent } from './components/body/acceuil/acceuil.component';
import { ProduitsComponent } from './components/body/produits/produits.component';
import { MarquesComponent } from './components/body/marques/marques.component';
import { GalerieComponent } from './components/body/galerie/galerie.component';



const routes: Routes = [
  { path: '', component: AcceuilComponent },
  { path: 'acceuil', component: AcceuilComponent },
  { path: 'produits', component: ProduitsComponent },
  { path: 'marques', component: MarquesComponent },
  { path: 'galerie', component: GalerieComponent },





];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
