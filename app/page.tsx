import Image from "next/image";
import styles from "./page.module.css";
import { useEffect, useState } from "react";

export default async function Home() {
  const aMonths = [
    "",
    "januari",
    "februari",
    "maart",
    "april",
    "mei",
    "juni",
    "juli",
    "augustus",
    "september",
    "oktober",
    "november",
    "december",
  ];

  let episodes = [];
  const fetchData = async () => {
    let response = await fetch(
      "https://www.zuidwestupdate.nl/wp-json/wp/v2/tv/29457"
    );
    let data = await response.json();
    let episodes = data.episodes.filter((episode) => {
      const episodeDate = new Date(episode.date);
      return episodeDate > new Date("2021-01-01");
    });

    return episodes;
  };

  episodes = await fetchData();

  return (
    <>
      <div className="mainpane">
        <div className="header">
          <div className="container">
            <div className="linkzwtv">
              <a
                href="https://www.zuidwesttv.nl/tv/studiopepernoot"
                target="_blank"
              >
                BEKIJK EERDERE AFLEVERINGEN
              </a>
            </div>
            <div className="linksboz">
              <a href="https://www.sintboz.nl" target="_blank">
                MEER
                <br />
                INFORMATIE
              </a>
            </div>
            <div className="logo"></div>
          </div>
        </div>
        <div className="main">
          <div className="carousel">
            {episodes.map((episode: any, index) => {
              const episodeDate = new Date(episode.date);
              const day = episodeDate.getDate();
              const month = aMonths[episodeDate.getMonth() + 1];
              const year = episodeDate.getFullYear();

              return (
                <div key={index} className="cell">
                  <div
                    style={{
                      width: "100%",
                      position: "relative",
                      textAlign: "center",
                    }}
                  >
                    <div
                      id={`videoplayer_wrapper_${index}`}
                      style={{ width: "100%", height: "100%" }}
                    ></div>
                    <div className="title">
                      {episode.title}
                      <br />
                      {day} {month} {year}
                    </div>
                  </div>
                </div>
              );
            })}
            {!episodes && (
              <div className="cell">
                <div
                  style={{
                    width: "100%",
                    position: "relative",
                    textAlign: "center",
                  }}
                >
                  <div className="title">
                    Kijk vanaf maandag 9 november naar de nieuwste afleveringen
                    van Studio Pepernoot!
                  </div>
                </div>
              </div>
            )}
          </div>
        </div>
        <div className="footer"></div>
      </div>
      <script
        dangerouslySetInnerHTML={{
          __html: `
    jQuery(".carousel").slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: false
  });`,
        }}
      ></script>
    </>
  );
}
