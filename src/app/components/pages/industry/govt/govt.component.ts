import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-govt',
  templateUrl: './govt.component.html',
  styleUrls: ['./govt.component.scss']
})
export class GovtComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Industry Verticals - Jenesys Technologies');

  }

}
