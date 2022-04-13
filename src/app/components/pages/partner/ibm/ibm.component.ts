import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-ibm',
  templateUrl: './ibm.component.html',
  styleUrls: ['./ibm.component.scss']
})
export class IbmComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Partner Solutions - Jenesys Technologies');

  }

}
