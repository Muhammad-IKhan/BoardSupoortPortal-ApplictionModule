// public/js/header/header.js
/* <script> */
    // ???????????????????????????????????????????
    // Existing navigation scripts remain the same
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    let navOpen = false;

    function toggleNav() {
        if (navOpen) {
            closeNav();
            navOpen = false;
        } else {
            openNav();
            navOpen = true;
        }
    }

    function openNav() {
        const sidebar = document.getElementById("mySidebar");
        const sidebar2 = document.getElementById("mySidebar2");

        sidebar.style.width = "43%";
        sidebar2.style.marginRight = "50%";
        sidebar.style.paddingLeft = "50px";

        sidebar.style.transition = "width 0.5s ease, padding-left 0.5s ease";
        sidebar2.style.transition = "margin-right 0.5s ease";
    }

    function closeNav() {
        const sidebar = document.getElementById("mySidebar");
        const sidebar2 = document.getElementById("mySidebar2");

        sidebar.style.width = "0";
        sidebar2.style.marginRight = "0";
        sidebar.style.paddingLeft = "0";

        sidebar.style.transition = "width 0.5s ease, padding-left 0.5s ease";
        sidebar2.style.transition = "margin-right 0.5s ease";
    }
// </script>
// <script>
    document.addEventListener('DOMContentLoaded', () => {
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach((item, index) => {
            item.style.animationDelay = `${0.1 * (index + 1)}s`;
        });
    });
// </script>
// <script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('#pills-tab .nav-link');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active and show classes from all tabs and panes
            tabButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-500', 'text-white');
                btn.classList.add('text-gray-600', 'hover:bg-blue-100', 'hover:text-blue-700');
                btn.setAttribute('aria-selected', 'false');
            });

            tabPanes.forEach(pane => {
                pane.classList.remove('show', 'active');
            });

            // Add active classes to clicked tab and corresponding pane
            this.classList.add('active', 'bg-blue-500', 'text-white');
            this.classList.remove('text-gray-600', 'hover:bg-blue-100', 'hover:text-blue-700');
            this.setAttribute('aria-selected', 'true');

            const targetPaneId = this.getAttribute('data-target');
            const targetPane = document.querySelector(targetPaneId);
            targetPane.classList.add('show', 'active');
        });
    });
});
// </script>



/* <script> */
document.addEventListener('DOMContentLoaded', function() {
const tabs = ['news', 'videos', 'contact', 'downloads']; // Add all tab IDs here

tabs.forEach(tabId => {
    const wrapper = document.getElementById(`${tabId}TickerWrapper`);
    if (!wrapper) return; // Skip if wrapper doesn't exist

    // Specifically for news tickers 
    if (['news'].includes(tabId)) {
        function moveTicker() {
            const list = wrapper.querySelector('ul');
            if (!list) return;

            const listItems = list.querySelectorAll('li');
            if (listItems.length <= 1) return;

            // Ensure list has relative positioning and hidden overflow
            list.style.position = 'relative';
            list.style.overflow = 'hidden';
            list.style.height = `${list.offsetHeight}px`;

            // Take the first item
            const firstItem = listItems[0];
            const itemHeight = firstItem.offsetHeight;

            // Prepare first item for animation
            firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
            firstItem.style.transform = `translateY(-${itemHeight}px)`;
            firstItem.style.opacity = '0';

            // After animation, move item to end of list
            // setTimeout(() => {
            //     // Reset first item's styles
            //     firstItem.style.transition = 'none';
            //     firstItem.style.transform = 'translateY(0)';
            //     firstItem.style.opacity = '1';

            //     // Move to end of list
            //     list.appendChild(firstItem);
            // }, 500);

            // After animation, move item to end
            setTimeout(() => {
                // Reset item styles
                firstItem.style.transition = 'none';
                firstItem.style.transform = 'translateY(0)';
                firstItem.style.opacity = '1';

                // Move to end of list
                list.appendChild(firstItem);
            }, 500);
        }

        // Move ticker every 3 seconds
        const intervalId = setInterval(moveTicker, 3000);

        // Optional: Pause on hover
        wrapper.addEventListener('mouseenter', () => clearInterval(intervalId));
        wrapper.addEventListener('mouseleave', () => {
            clearInterval(intervalId);
            setInterval(moveTicker, 3000);
        });
    }  

    // Specifically for video tickers
    if (['videos'].includes(tabId)) {
        let currentPosition = 0;
        // Fade and Slide:
        function moveTicker() {
            // Find the <ul> within the wrapper
            const list = wrapper.querySelector('ul');
            if (!list) return;

            // Get the first list item
            const firstItem = list.querySelector('li');
            if (!firstItem) return;

            // Get the height of a single list item
            const itemHeight = firstItem.offsetHeight || 50;

            // Move the list up
            currentPosition -= itemHeight;

            // Reset position if it goes beyond content
            if (Math.abs(currentPosition) >= list.scrollHeight / 2) {
                currentPosition = 0;
            }

            // Apply smooth translation
            list.style.transition = 'transform 0.5s ease';
            list.style.transform = `translateY(${currentPosition}px)`;
        }

        // Move ticker every 2 seconds
        const intervalId = setInterval(moveTicker, 2000);

        // Optional: Pause on hover
        wrapper.addEventListener('mouseenter', () => clearInterval(intervalId));
        wrapper.addEventListener('mouseleave', () => {
            // Restart the interval when mouse leaves
            clearInterval(intervalId);
            setInterval(moveTicker, 2000);
        });
    }
    

    // Specifically for contact tickers 
    if (['contact'].includes(tabId)) {
        let currentPosition = 0;
        
        // Flip Animation:
        // function moveTicker() {
        //     const list = wrapper.querySelector('ul');
        //     const firstItem = list.querySelector('li');
            
        //     firstItem.style.transition = 'transform 0.5s';
        //     firstItem.style.transform = 'rotateX(90deg)';

        //     setTimeout(() => {
        //         list.appendChild(firstItem);
        //         firstItem.style.transform = 'rotateX(0)';
        //     }, 500);
        // }

        // Scale Down and Fade:
        // function moveTicker() {
        //     const list = wrapper.querySelector('ul');
        //     const firstItem = list.querySelector('li');
            
        //     firstItem.style.transition = 'all 0.4s ease';
        //     firstItem.style.transform = 'scale(0.8)';
        //     firstItem.style.opacity = '0';

        //     setTimeout(() => {
        //         list.appendChild(firstItem);
        //         firstItem.style.transform = 'scale(1)';
        //         firstItem.style.opacity = '1';
        //     }, 400);
        // }

        // Subtle Bounce:
        // function moveTicker() {
        //     const list = wrapper.querySelector('ul');
        //     const firstItem = list.querySelector('li');
            
        //     firstItem.style.transition = 'transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
        //     firstItem.style.transform = 'translateY(-100%) scale(0.9)';

        //     setTimeout(() => {
        //         list.appendChild(firstItem);
        //         firstItem.style.transform = 'translateY(0) scale(1)';
        //     }, 400);
        // }

        // Slide with Perspective:
        // function moveTicker() {
        //     const list = wrapper.querySelector('ul');
        //     const firstItem = list.querySelector('li');
            
        //     list.style.perspective = '1000px';
        //     firstItem.style.transition = 'transform 0.5s';
        //     firstItem.style.transform = 'translateY(-100%) rotateX(90deg)';

        //     setTimeout(() => {
        //         list.appendChild(firstItem);
        //         firstItem.style.transform = 'translateY(0) rotateX(0)';
        //     }, 500);
        // }

        // 
        // function moveTicker() {
        //     const list = wrapper.querySelector('ul');
        //     if (!list) return;

        //     const listItems = list.querySelectorAll('li');
        //     if (listItems.length <= 1) return;

        //     // Slide up the first item
        //     const firstItem = listItems[0];
        //     const itemHeight = firstItem.offsetHeight;

        //     // Animate first item out
        //     firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        //     firstItem.style.transform = `translateX(-${itemHeight}px)`;
        //     firstItem.style.opacity = '0';

        //     // After animation, move item to end
        //     setTimeout(() => {
        //         // Reset item styles
        //         firstItem.style.transition = 'none';
        //         firstItem.style.transform = 'translateY(0)';
        //         firstItem.style.opacity = '1';

        //         // Move to end of list
        //         list.appendChild(firstItem);
        //     }, 500);
        // }

        // Slide Ticker
        function moveTicker() {
            const list = wrapper.querySelector('ul');
            const listItems = list.querySelectorAll('li');
            if (listItems.length <= 1) return;

            const firstItem = listItems[0];
            const itemHeight = firstItem.offsetHeight;

            firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
            firstItem.style.transform = `translateX(-${itemHeight}px)`;
            firstItem.style.opacity = '0';

            setTimeout(() => {
                firstItem.style.transition = 'none';
                firstItem.style.transform = 'translateY(0)';
                firstItem.style.opacity = '1';
                list.appendChild(firstItem);
            }, 500);
        }

        // Move ticker every 1 second
        const intervalId = setInterval(moveTicker, 3000);

        // Optional: Pause on hover
        wrapper.addEventListener('mouseenter', () => {
            console.log('Mouse entered contact ticker');
            clearInterval(intervalId);
        });
        wrapper.addEventListener('mouseleave', () => {
            console.log('Mouse left contact ticker');
            clearInterval(intervalId);
            setInterval(moveTicker, 3000);
        });
    }
});
});
// </script>