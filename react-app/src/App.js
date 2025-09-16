import React from "react";
import CardSwap, { Card } from "./CardSwap";
import "./CardSwap.css"; // Pastikan ini sesuai path kamu

function App() {
  return (
    <div style={{ padding: 50 }}>
      <CardSwap delay={4000} pauseOnHover={true}>
        <Card customClass="red-card" />
        <Card customClass="green-card" />
        <Card customClass="blue-card" />
        <Card customClass="yellow-card" />
      </CardSwap>
    </div>
  );
}

export default App;
