import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
declare var $: any;

@Component({
  selector: 'app-home-one',
  templateUrl: './home-one.component.html',
  styleUrls: ['./home-one.component.scss']
})
export class HomeOneComponent implements OnInit {

  constructor(private titleCap: Title) { }

  ngOnInit(): void {
    this.titleCap.setTitle('Home - Jenesys Technologies')
    var owl = $('.owl-carousel.clients-slider');
    owl.owlCarousel({
      // items: 4,
      // loop: true,
      // margin: 10,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      // itemsMobile: [479, 1], // 1 item between 479 and 0
      // navigation: true,
      // lazyLoad: true,
      // itemsDesktop : [1000,4]
      loop: true,
      margin: 25,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false,
          loop: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: false,
          loop: true
        }
      }
    });
  }

}
