import WebFont from 'webfontloader'

export function loadFonts () {
  WebFont.load({
    google: {
      families: ['Merriweather', 'Merriweather:italic', 'Oswald']
    }
  })
}
