import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-ebusiness',
  templateUrl: './ebusiness.component.html',
  styleUrls: ['./ebusiness.component.scss']
})
export class EbusinessComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Enterprise Solutions - Jenesys Technologies');

  }

}
