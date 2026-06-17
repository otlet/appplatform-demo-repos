package main

import (
	"log"
	"os"
	"runtime"
	"time"

	"github.com/gofiber/fiber/v2"
)

func port() string {
	if p := os.Getenv("PORT"); p != "" {
		return p
	}
	return "3000"
}

func main() {
	app := fiber.New()

	app.Get("/", func(c *fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"app": "go-fiber demo",
			"endpoints": []string{
				"/date", "/env", "/server",
			},
		})
	})

	app.Get("/date", func(c *fiber.Ctx) error {
		return c.JSON(fiber.Map{"date": time.Now().Format("2006-01-02")})
	})

	app.Get("/env", func(c *fiber.Ctx) error {
		return c.JSON(fiber.Map{"TESTOWYENV": os.Getenv("TESTOWYENV")})
	})

	app.Get("/server", func(c *fiber.Ctx) error {
		hostname, _ := os.Hostname()
		return c.JSON(fiber.Map{
			"hostname": hostname,
			"os":       runtime.GOOS,
			"arch":     runtime.GOARCH,
			"port":     port(),
			"runtime":  runtime.Version(),
		})
	})

	log.Fatal(app.Listen(":" + port()))
}
