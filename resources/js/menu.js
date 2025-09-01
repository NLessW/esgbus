const menus = [
    {
        route: "about.index",
        name: "으쓱버스 소개",
        submenus: [
            { route: "about.index", name: "소개" },
            { route: "about.ci", name: "CI" },
        ],
    },
    {
        route: "booking.index",
        name: "체험 예약",
        submenus: [
            { route: "booking.create", name: "예약하기", aTag: true },
            { route: "booking.index", name: "예약 확인 및 수정" },
            { route: "booking.estimate", name: "체험견적" },
        ],
    },
    {
        route: "community.notice",
        name: "커뮤니티",
        submenus: [
            { route: "community.notice", name: "공지사항" },
            { route: "community.gallery", name: "갤러리" },
            { route: "community.private", name: "1:1문의" },
            { route: "community.newsroom", name: "뉴스룸" },
        ],
    },
    {
        route: "donation.index",
        name: "후원",
        submenus: [
            { route: "donation.index", name: "기부하기", external: true },
        ],
    },
    {
        route: "esg.index",
        name: "ESG경영",
        submenus: [
            { route: "esg.index", name: "ESG경영" },
            // { route: "esg.leader", name: "ESG리더" },
        ],
    },
];

export default menus;
