import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-reengineering',
  templateUrl: './reengineering.component.html',
  styleUrls: ['./reengineering.component.scss']
})
export class ReengineeringComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Enterprise Solutions - Jenesys Technologies');

  }

}
