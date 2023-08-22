import { apiLoader } from "./map-loader";

export const run = () => {
  document
    .querySelectorAll<HTMLElement>('[data-component="map-picker"]')
    .forEach((component) => {
      const props = component.dataset.props;

      let longitude: number;
      let latitude: number;

      if (props) {
        const propsArray = props.split(",");
        longitude = parseFloat(propsArray[0]);
        latitude = parseFloat(propsArray[1]);
      } else {
        longitude = -12.05173489;
        latitude = -77.03465145;
      }

      apiLoader.load().then(async (google) => {
        const { Map } = (await google.maps.importLibrary(
          "maps"
        )) as google.maps.MapsLibrary;
        const { Marker } = (await google.maps.importLibrary(
          "marker"
        )) as google.maps.MarkerLibrary;
        const { LatLng } = (await google.maps.importLibrary(
          "core"
        )) as google.maps.CoreLibrary;

        const initPosition = new LatLng(longitude, latitude);

        const googleMap = new Map(
          component.querySelector("#map") as HTMLElement,
          {
            center: initPosition,
            zoom: 15,
          }
        );

        const mapMarker = new Marker({
          map: googleMap,
          position: initPosition,
        });

        googleMap.addListener("click", (event) => {
          const mapControl = document.getElementById("map") as HTMLElement;

          mapMarker.setPosition(event.latLng);
          mapControl.dataset.marker = `${event.latLng
            .lat()
            .toFixed(8)},${event.latLng.lng().toFixed(8)}`;
        });
      });
    });
};
