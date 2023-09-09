"use client";

import React from "react";
import Slider from "react-slick";

export default function Carousel({ children }) {
  return (
    <Slider
      className="carousel"
      infinite={false}
      slidesToShow={1}
      slidesToScroll={1}
      centerMode={false}
    >
      {children}
    </Slider>
  );
}
