# Google Maps
<!-- MarkdownTOC -->

- [Ionic using Google Maps API](#ionic-using-google-maps-api)
- [Trouble Shooting](#trouble-shooting)
    - [The lights are on but nobody's home](#the-lights-are-on-but-nobodys-home)
- [Google maps on Capacitor (Android)](#google-maps-on-capacitor-android)

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

        let latLng = new google.maps.LatLng(40.741895, 73.989308);

        let mapOptions = {
            center: latLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);

        this.addMarker(latLng, 'Runcorn Tavern')
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


## Google maps on Capacitor (Android)

https://ionicframework.com/docs/native/google-maps

```bash +torchlight-bash
npm install @capacitor/google-maps
npm install @capacitor/geolocation
npx capacitor sync
```

```html
<!-- android/app/src/main/AndroidManifest.xml -->
<meta-data android:name="com.google.android.geo.API_KEY" android:value="YOUR_API_KEY_HERE"/>
<!-- add necessary permissions -->
<uses-permission android:name="android.permission.ACCESS_FINE_LOCATION" />
<uses-permission android:name="android.permission.INTERNET" />
```

For Angular users, you will get an error warning that this web component is unknown to the Angular
compiler. This is resolved by modifying the ts file that declares your component to allow for
custom web components. (CUSTOM_ELEMENTS_SCHEMA)

```js
// src/app/map.page.ts (standalone component)
import { Component, ViewChild, CUSTOM_ELEMENTS_SCHEMA, ElementRef } from '@angular/core';
import { GoogleMap, Marker } from '@capacitor/google-maps';
import { environment } from 'src/environments/environment';

@Component({
    ...
    standalone: true,
    styles: [`
        ion-content { --background: transparent; }
        capacitor-google-map { display: inline-block; width: 100%; height: 100%; }`
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class MapPage {

    @ViewChild('map') mapRef: ElementRef;
    map: GoogleMap;

    ionViewDidEnter() {
        this.createMap()
    }

    async createMap() {
        this.map = await GoogleMap.create(
            {
            id: 'my-map',
            apiKey: environment.mapsKey,
            element: this.mapRef.nativeElement,
            config: {
                center: { lat: -27.595725912524248, lng: 153.06536734191715 },
                zoom: 8,
            },
        }
        );
        this.addMarkers();
    }

    async addMarkers() {

        const markers: Marker[] = [{
            title: 'Runcorn Tavern',
            coordinate: { lat: -27.595725912524248, lng: 153.06536734191715 },
            snippet: 'some snippet'
        }];

        await this.map.addMarkers(markers);

    }

}
```
