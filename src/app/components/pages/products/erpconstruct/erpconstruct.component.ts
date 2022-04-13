import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-erpconstruct',
  templateUrl: './erpconstruct.component.html',
  styleUrls: ['./erpconstruct.component.scss']
})
export class ErpconstructComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Products - Jenesys Technologies');

  }

}
