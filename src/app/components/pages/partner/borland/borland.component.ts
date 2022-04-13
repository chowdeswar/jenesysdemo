import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-borland',
  templateUrl: './borland.component.html',
  styleUrls: ['./borland.component.scss']
})
export class BorlandComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Partner Solutions - Jenesys Technologies');

  }

}
