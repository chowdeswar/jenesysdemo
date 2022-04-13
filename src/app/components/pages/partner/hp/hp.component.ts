import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-hp',
  templateUrl: './hp.component.html',
  styleUrls: ['./hp.component.scss']
})
export class HpComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Partner Solutions - Jenesys Technologies');

  }

}
