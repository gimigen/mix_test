<?php

namespace AppBundle\Command;

use GuzzleHttp\Psr7\Stream;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

class CrawlMixesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('crawl-mixes')
            ->setDescription('Crawls mixes lists.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://m-1.fm/topai/weekendmix');
        $output->writeln($response->getStatusCode());
        /** @var Stream $body */
        $body = $response->getBody();

        $html = $body->getContents();

        $crawler = new Crawler($html);
        $crawler->filter('.desc')->each(function (Crawler $node, $i) {
//            echo $node->text();
        });

        /** @var \DOMElement $node */
        $i = 0;
        foreach ($crawler->filter('.wcmPod') as $node) {
            $output->writeln($node->getAttribute('id'));
            $subject = $node->getElementsByTagName('div')->item(0)->textContent;
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
                $output->writeln($i++ . ' ' . $line);
            }
        }

        $output->writeln('test');
    }
}