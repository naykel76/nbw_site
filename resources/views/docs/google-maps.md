# Google Maps
<!-- MarkdownTOC -->

- [Ionic using Google Maps API](#ionic-using-google-maps-api)
- [Trouble Shooting](#trouble-shooting)
	- [The lights are on but nobody's home](#the-lights-are-on-but-nobodys-home)

<!-- /MarkdownTOC -->


<a id="ionic-using-google-maps-api"></a>
## Ionic using Google Maps API

```html
<!-- src/index.html -->
<script src="http://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
```

```js
// src/maps/maps.page.ts
import { Component, ViewChild, AfterViewInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';

declare let google: any;

@Component({
    selector: 'app-map',
    template: ` <div class="h-screen" #map id="map"></div> `,
    standalone: true,
    imports: [IonicModule, CommonModule]
})
export class MapPage implements AfterViewInit {

    @ViewChild('map') mapElement: any;
    map: any;

  ngAfterViewInit() {

        let latLng = new google.maps.LatLng(-27.5526, 153.0539);

        let mapOptions = {
            center: latLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);

        this.addMarker(latLng, 'Griffith')
    }

    addMarker(position, title) {
        let marker = new google.maps.Marker({
            position: position,
            map: this.map,
            title: title
        });

        let infoWindow = new google.maps.InfoWindow({
            content: 'This is my marker!'
        });

        marker.addListener('click', () => {
            infoWindow.open(this.map, marker);
        });
    }
}
```

<a id="trouble-shooting"></a>
## Trouble Shooting

<a id="the-lights-are-on-but-nobodys-home"></a>
#### The lights are on but nobody's home

If you're returning the map object but it's not visible on the screen, then it's likely that you
have not specified the height for the map element. Set the map element `height: 100%` then check
again.
