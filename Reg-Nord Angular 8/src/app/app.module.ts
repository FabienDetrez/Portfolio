import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { BodyComponent } from './components/body/body.component';
import { FooterComponent } from './components/footer/footer.component';
import { AcceuilComponent } from './components/body/acceuil/acceuil.component';
import { ProduitsComponent } from './components/body/produits/produits.component';
import { MarquesComponent } from './components/body/marques/marques.component';
import { GalerieComponent } from './components/body/galerie/galerie.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    BodyComponent,
    FooterComponent,
    AcceuilComponent,
    ProduitsComponent,
    MarquesComponent,
    GalerieComponent,
    

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
