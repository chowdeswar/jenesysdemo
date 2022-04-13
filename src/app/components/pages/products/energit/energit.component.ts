import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-energit',
  templateUrl: './energit.component.html',
  styleUrls: ['./energit.component.scss']
})
export class EnergitComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Products - Jenesys Technologies');

  }

}
