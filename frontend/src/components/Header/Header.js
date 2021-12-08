import "./Header.css";
import React from "react";
import { Navigate } from "react-router";

const Header = () => {


  return (
    <div>
      <div className="callout primary">
        <div className="row column">
          <h1>Hello! Book your book.</h1>
        </div>
      </div>
    </div>
  );
};

export default Header;
