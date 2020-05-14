import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-body',
  templateUrl: './body.component.html',
  styleUrls: ['./body.component.css']
})
export class BodyComponent implements OnInit {

  produits = [
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },
    { type: 'ABB-Bailey-1.png', titre: 'myLink', reference:'', descriptif:'',photo:'', doctech:'' },


  ]  
  constructor() { }

  ngOnInit() {
  }

}
