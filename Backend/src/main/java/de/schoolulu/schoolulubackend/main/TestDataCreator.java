package de.schoolulu.schoolulubackend.main;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.entity.Review;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.entity.User;
import de.schoolulu.schoolulubackend.main.repositorys.ReviewRepository;
import de.schoolulu.schoolulubackend.main.repositorys.SchoolRepository;
import de.schoolulu.schoolulubackend.main.repositorys.UserRepository;

/**
 * @author Silas
 *
 */
@Service
public class TestDataCreator {

	/**
	 * 
	 */
	private final static Logger LOGGER = LoggerFactory.getLogger(TestDataCreator.class);

	/**
	 * 
	 */
	@Autowired
	private UserRepository repo;

	/**
	 * 
	 */
	@Autowired
	private SchoolRepository sRepo;

	/**
	 * 
	 */
	@Autowired
	private ReviewRepository rRepo;

	/**
	 * 
	 */
	// @PostConstruct
	public void createTestData() {
		User u1 = new User("Silas", "silas@abc.de", "0cbc6611f5540bd0809a388dc95a615b");
		User u2 = new User("Maurice", "maurice@abc.de", "0cbc6611f5540bd0809a388dc95a615b");
		User u3 = new User("Noah", "noah@abc.de", "0cbc6611f5540bd0809a388dc95a615b");
		User u4 = new User("Robin", "robin@abc.de", "0cbc6611f5540bd0809a388dc95a615b");

		this.repo.save(u1);
		this.repo.save(u2);
		this.repo.save(u3);
		this.repo.save(u4);

		LOGGER.info("Test Users created");

		School s1 = new School("Berufskolleg Beckum", "Beckum", "59269", "Hansaring", "11",
				"https://imgur.com/R0jwsVG.png", 0);
		School s2 = new School("Carl-Miele-Berufskolleg", "Gütersloh", "33330", "Carl-Miele-Straße", "45",
				"https://imgur.com/h3TSBi4.png", 0);
		School s3 = new School("Paul Spiegel Berufskolleg", "Warendorf", "48231", "Paul-Spiegel-Weg", "89",
				"https://img001.prntscr.com/file/img001/NpSNL2r1S-68Vdt2h_8mAg.png", 0);
		School s4 = new School("Gesamtschule HSW", "HSW", "12345", "Sternstraße", "34a",
				"https://img001.prntscr.com/file/img001/lCSHSvXDSH66GZXKLUTbSA.png", 0);
		School s5 = new School("Gesamtschule Rheda", "Rheda", "33378", "Gesunderweg", "40c",
				"https://img001.prntscr.com/file/img001/WD7SCG84Qh21h9x17W2LFg.png", 0);
		School s6 = new School("Hans-Böckler Berufskolleg", "Münster", "48155", "Hoffschultestraße", "50",
				"https://img001.prntscr.com/file/img001/aEJ5xMhHRXSyrbio7YUXew.jpg", 0);

		School s7 = new School("Albert-Einstein-Gymnasium", "Berlin", "10115", "Einsteinstraße", "12",
				"https://imgur.com/abcdefg.png", 0);
		School s8 = new School("Johannes-Gutenberg-Gesamtschule", "Cologne", "50667", "Gutenbergstraße", "56",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s9 = new School("Max-Planck-Gymnasium", "Munich", "80331", "Planckstraße", "78",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s10 = new School("Marie-Curie-Realschule", "Frankfurt", "60313", "Curieweg", "34",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s11 = new School("Theodor-Heuss-Gymnasium", "Stuttgart", "70173", "Heussstraße", "9",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s12 = new School("Rudolf-Diesel-Berufsschule", "Hamburg", "20095", "Dieselstraße", "67",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s13 = new School("Friedrich-Schiller-Gymnasium", "Dresden", "01067", "Schillerstraße", "23",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s14 = new School("Gutenberg-Gymnasium", "Mainz", "55116", "Gutenbergplatz", "7",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s15 = new School("Hermann-Hesse-Realschule", "Karlsruhe", "76131", "Hessestraße", "45",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s16 = new School("Heinrich-Heine-Gesamtschule", "Düsseldorf", "40213", "Heinrich-Heine-Straße", "56",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s17 = new School("Lise-Meitner-Gymnasium", "Hannover", "30159", "Meitnerstraße", "18",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s18 = new School("Goethe-Realschule", "Bonn", "53111", "Goethestraße", "27",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s19 = new School("Werner-von-Siemens-Schule", "Leipzig", "04103", "Siemensstraße", "32",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);
		School s20 = new School("Robert-Koch-Gymnasium", "Mannheim", "68161", "Kochstraße", "14",
				"https://www.perodua.com.my/assets/gif/loading4.gif", 0);

		this.sRepo.save(s1);
		this.sRepo.save(s2);
		this.sRepo.save(s3);
		this.sRepo.save(s4);
		this.sRepo.save(s5);
		this.sRepo.save(s6);
		this.sRepo.save(s7);
		this.sRepo.save(s8);
		this.sRepo.save(s9);
		this.sRepo.save(s10);
		this.sRepo.save(s11);
		this.sRepo.save(s12);
		this.sRepo.save(s13);
		this.sRepo.save(s14);
		this.sRepo.save(s15);
		this.sRepo.save(s16);
		this.sRepo.save(s17);
		this.sRepo.save(s18);
		this.sRepo.save(s19);
		this.sRepo.save(s20);

		LOGGER.info("Test Schools created");

		Review testReview = new Review(this.repo.findByName("Silas"), this.sRepo.findById(2));

		ReviewContent content = new ReviewContent();

		content.setAccessibility(5);
		content.setAtmosphere(5);
		content.setCanteen(3);
		content.setCompetence(2);
		content.setEquality(4);
		content.setInternet(2);
		content.setMateHandling(1);
		content.setParkingSpot(1);
		content.setRoomEquipment(4);
		content.setToilets(4);
		content.setTransportConnections(2);

		testReview.setReviewContent(content);

		this.rRepo.save(testReview);
		LOGGER.info("Test Review created");

	}

}
