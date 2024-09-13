

document.getElementById("live-chat").addEventListener('click', () => {
    function querySelectorAllInIframes(selector) {
        let elements = [];
        const recurse = (contentWindow = window) => {
            const iframes = contentWindow.document.body.querySelectorAll('iframe');
            iframes.forEach(iframe => recurse(iframe.contentWindow));
            elements = elements.concat(contentWindow.document.body.querySelectorAll(selector));
        }
        recurse();
        return elements;
    };
    querySelectorAllInIframes('#button-body').forEach(ele => {
        if (ele.length > 0) {
            ele[0].click()
        }
    })

})