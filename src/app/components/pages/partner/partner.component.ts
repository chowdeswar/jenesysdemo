import { Location } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
    selector: 'app-partner',
    templateUrl: './partner.component.html',
    styleUrls: ['./partner.component.scss']
})
export class PartnerComponent implements OnInit {
    locationPath: string;

    constructor(private titleCap: Title, private location: Location) { }

    ngOnInit(): void {
        this.titleCap.setTitle('Partner Solutions - Jenesys Technologies');
        this.locationPath = window.location.protocol + '' + window.location.host;
        // this.location.subscribe(res => {
        // console.log(this.locationPath);
        // });

    }

}
