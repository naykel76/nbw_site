// Remove all visible videos from Watch Later
const buttons = [...document.querySelectorAll('ytd-playlist-video-renderer')];
let delay = 500;

buttons.forEach((item, index) => {
    setTimeout(() => {
        const menuButton = item.querySelector('#button[aria-label^="Action menu"]');
        if (menuButton) menuButton.click();

        setTimeout(() => {
            const removeButton = [...document.querySelectorAll('ytd-menu-service-item-renderer')]
                .find(el => el.innerText.includes('Remove from Watch later'));
            if (removeButton) removeButton.click();
        }, 200);
    }, index * delay);
});

// Remove the first visible video from Watch Later
const firstItem = document.querySelector('ytd-playlist-video-renderer');

if (!firstItem) {
    console.log('No video found.');
} else {
    const menuButton = firstItem.querySelector('#button[aria-label^="Action menu"]');
    if (menuButton) {
        menuButton.click();

        setTimeout(() => {
            const removeButton = [...document.querySelectorAll('ytd-menu-service-item-renderer')]
                .find(el => el.innerText.includes('Remove from Watch later'));
            if (removeButton) {
                removeButton.click();
                console.log('Removed first video from Watch Later.');
            } else {
                console.log('Remove option not found.');
            }
        }, 300);
    } else {
        console.log('Menu button not found.');
    }
}