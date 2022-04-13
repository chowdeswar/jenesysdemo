import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-validation',
  templateUrl: './validation.component.html',
  styleUrls: ['./validation.component.scss']
})
export class ValidationComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Systems Solutions - Jenesys Technologies');

  }

}
