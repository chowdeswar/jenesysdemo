import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-finedeal',
  templateUrl: './finedeal.component.html',
  styleUrls: ['./finedeal.component.scss']
})
export class FinedealComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Products - Jenesys Technologies');

  }

}
