import type { Metadata } from "next";
import { Inter } from "next/font/google";
import "@/styles/globals.scss";
import Bootstrap from "./bootstrap";
import Script from "next/script";

const inter = Inter({ subsets: ["latin"] });

export const metadata: Metadata = {
  title: "Miss 18 - Fashion Store",
  description: "Stylish fashion for women",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <head>
        <link 
          rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        />
      </head>
      <body className={inter.className}>
        <Bootstrap />
        {children}
        <Script 
          src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
          strategy="beforeInteractive"
        />
      </body>
    </html>
  );
}
