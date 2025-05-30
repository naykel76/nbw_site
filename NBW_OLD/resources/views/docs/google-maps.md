# Google Maps API

- [Trouble Shooting](#trouble-shooting)
    - [The lights are on but nobody's home](#the-lights-are-on-but-nobodys-home)
- [Google maps on Capacitor (Android)](#google-maps-on-capacitor-android)



## Request

A Geocoding API request takes the following form:

```
https://maps.googleapis.com/maps/api/geocode/outputFormat?parameters
```
https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY
```
https://maps.googleapis.com/maps/api/geocode/json?place_id=ChIJeRpOeF67j4AR9ydy_PIzPuM&key=YOUR_API_KEY
```
<!-- 



```js

        let latLng = new google.maps.LatLng(40.741895, 73.989308);

        let mapOptions = {
            center: latLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);

        this.addMarker(latLng, 'Runcorn Tavern')

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



```js
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
``` -->
