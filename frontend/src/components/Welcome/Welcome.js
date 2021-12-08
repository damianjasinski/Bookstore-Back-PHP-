import React from "react";

const Welcome = () => {
  return (
    <div>
      <div className="row">
        <h2> WILKOMMEN !</h2>
        <a href = "/login" className = "button primary">Login</a>
        <a href = "/Signup" className = "button secondary">Register</a>
      </div>
    </div>
  );
};

export default Welcome;
