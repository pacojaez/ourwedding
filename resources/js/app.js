require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// module.exports = {
//     theme: {
//         extend: {
//             fontSize: {
//                 '10xl': '8rem',
//             },
//             fontFamily: {
//                 'montserrat': ['Montserrat'],
//                 'abhaya-libre': ['Abhaya Libre'],
//                 'alegraya-sans': ['Alegreya Sans'],
//             },
//             letterSpacing: {
//                 widest: '.25em',
//             }
//         },
//     },
// };

// const anime = require('animejs');

// var elements = document.querySelector('svg').children;

// anime({
//     targets: '.cls-1',
//     translateX: [
//         { value: 270, duration: 1000, easing: 'easeOutSine' },
//         { value: 0, duration: 1000, easing: 'easeOutSine' }
//     ],
//     delay: anime.stagger(200, { grid: [16, 10], from: 7 }),
//     loop: true
// })

// anime({
//     targets: '.svgcontainer',
//     translateY: 10,
//     autoplay: true,
//     loop: true,
//     easing: 'easeInOutSine',
//     direction: 'alternate'
// });
