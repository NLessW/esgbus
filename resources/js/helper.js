const helper = {
    removeATags(htmlContent) {
        const regex = /<a\b[^>]*>(.*?)<\/a>/gi;
        return htmlContent.replace(regex, "$1");
    },
};

export default helper;
