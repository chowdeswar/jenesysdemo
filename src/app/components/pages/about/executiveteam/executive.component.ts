import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
declare var $: any;

@Component({
    selector: 'app-executive',
    templateUrl: './executive.component.html',
    styleUrls: ['./executive.component.scss']
})
export class ExecutiveTeamComponent implements OnInit {

    constructor(private titleCap: Title) { }

    ngOnInit(): void {
        this.titleCap.setTitle('Team - Jenesys Technologies');
    }

}
