import "./globals.css";
import type { Metadata } from "next";

import logo from "../public/images/logo-studiopepernoot.png";

export const metadata: Metadata = {
  title: "Studio Pepernoot",
  description: "Studio Pepernoot",
  viewport: null,
  openGraph: {
    title: "Studio Pepernoot",
    description: "Studio Pepernoot",
    siteName: "Studio Pepernoot",
    type: "website",
    url: "http://www.studiopepernoot.nl",
    images: [
      {
        url: logo.src,
      },
    ],
  },
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="nl">
      <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script
          type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.15.4/video.min.js?ver=5.8.1"
          id="video.js-js"
        ></script>
        <link
          rel="stylesheet"
          type="text/css"
          href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
        />
        <script
          type="text/javascript"
          src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>
      </head>
      <body style={{ margin: "auto" }}>{children}</body>
    </html>
  );
}
