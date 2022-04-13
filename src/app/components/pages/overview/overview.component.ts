import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-overview',
  templateUrl: './overview.component.html',
  styleUrls: ['./overview.component.scss']
})
export class OverviewComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Overview - Jenesys Technologies');
  }

}
