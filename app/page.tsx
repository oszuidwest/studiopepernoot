import Carousel from "../components/carousel";

export default async function Home() {
  let response = await fetch(
    "https://www.zuidwestupdate.nl/wp-json/wp/v2/tv/29457"
  );
  let data = await response.json();
  let episodes = data.episodes.filter((episode) => {
    const episodeDate = new Date(episode.date);
    return episodeDate > new Date("2021-01-01");
  });

  let dateFormatter = new Intl.DateTimeFormat("nl-NL", { dateStyle: "long" });

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
          <Carousel>
            {episodes.map((episode: any, index) => {
              const episodeDate = new Date(episode.date);

              return (
                <div key={episode.date} className="cell">
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
                      {dateFormatter.format(episodeDate)}
                    </div>
                  </div>
                </div>
              );
            })}
            {!episodes.length && (
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
          </Carousel>
        </div>
        <div className="footer"></div>
      </div>
    </>
  );
}
