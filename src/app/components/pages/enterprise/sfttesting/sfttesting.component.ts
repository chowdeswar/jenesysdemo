import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-sfttesting',
  templateUrl: './sfttesting.component.html',
  styleUrls: ['./sfttesting.component.scss']
})
export class SfttestingComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Enterprise Solutions - Jenesys Technologies');

  }

}
